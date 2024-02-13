<?php
include_once 'fonction_base.php';
include_once 'fonction_donne.php';

function pourcent_salaire($pourcent, $id_cueilleur)
{
    $salairecueilleur  =  select_by("the_Cueilleurs_salaires", "id_cueilleur = " . $id_cueilleur);
    return ($salairecueilleur[0]['montant_salaire_kg'] * $pourcent) / 100;
}

function get_rendement_by_month($id_parcelle)
{
    $retour = null;
    $parcelle = select_by("the_Parcelles", "id_parcelle = " . $id_parcelle);
    if ($parcelle[0] != null) {
        $the_variete = select_by("the_Varietes_de_the", "id_variete = " . $parcelle[0]['id_variete']);
        $retour = intval($parcelle[0]['surface_hectare'] * 10000 / $the_variete[0]['occupation']);
        $retour = $retour * $the_variete[0]['rendement_par_pied'];
    } else {
        echo "parcelle pas de resultat";
    }
    return $retour;
}


function rendement_by_saison($id_parcelle, $date_begin, $date_end)
{
    $rdm = get_rendement_by_month($id_parcelle);
    $parcelle = select_by("the_Parcelles", "id_parcelle = " . $id_parcelle);
    $saison = select_by("the_saison", "id_variete = " . $parcelle[0]['id_variete'] . " AND mois >= MONTH('" . $date_begin . "') AND  mois <= MONTH('" . $date_end . "');");
    if ($saison == null) {
        return 0;
    }

    return $rdm * count($saison);
}

function get_rendement($id_parcelle, $date_begin, $date_end)
{
    if (!verify_Interv_date($date_begin, $date_end)) {
        return false;
    }
    // Récupérer le rendement mensuel par pied

    $rendement_by_month = get_rendement_by_month($id_parcelle);

    $date_beginD = new DateTime($date_begin);
    $date_endD = new DateTime($date_end);

    // Calculer la différence en jours
    $diffInDays = $date_beginD->diff($date_endD)->days;

    // Durée moyenne d'un mois en jours
    $averageDaysPerMonth = 365.25 / 12;

    // Calculer le nombre de mois avec une virgule
    $diffInMonths = $diffInDays / $averageDaysPerMonth;

    // Calculer le rendement total sur la période en fonction du rendement mensuel
    $total_rendement = $diffInMonths * $rendement_by_month;

    return $total_rendement;
}


function get_cueillette_Month($date_cueillette)
{
    $cueillette = request_all(
        "SELECT SUM(poids_cueilli) AS poids 
        FROM the_Cueillettes 
        WHERE 
        YEAR(date_cueillette) = YEAR('" . $date_cueillette . "') 
        AND MONTH(date_cueillette) = MONTH('" . $date_cueillette . "') 
        AND DAY(date_cueillette) < DAY('" . $date_cueillette . "')
        "
    );

    return $cueillette[0]['poids'];
}
function verify_cueillette($data)
{

    $dateBegin = rendementBefore($data);
    $rdm = rendement_by_saison($data[0]['id_parcelle'], $dateBegin, $data) - get_poids_cueilletteByPlle($data[0]['id_parcelle'],$dateBegin, $data);

    if ($rdm < $data['poids_cueilli']) {
        return false;
    } else {
        insert("the_Cueillettes", $data);
        return true;
    }
}


function verify_Interv_date($date_begin, $date_end)
{

    $date_beginD = new DateTime($date_begin);
    $date_endD = new DateTime($date_end);

    $timestamp_begin = $date_beginD->getTimestamp();
    $timestamp_end = $date_endD->getTimestamp();

    return $timestamp_begin <= $timestamp_end;
}

function get_poids_cueilletteByPlle($id_parcelle,$date_begin, $date_end)
{
    $retour = 0;
    $poids_cueillette = request_all(
        "SELECT SUM(poids_cueilli) 
        FROM the_Cueillettes 
        JOIN the_Parcelles ON the_Parcelles.id_parcelle = the_Cueillettes.id_parcelle 
        JOIN the_Varietes_de_the ON the_Varietes_de_the.id_variete = the_Parcelles.id_variete
        WHERE date_cueillette BETWEEN '" . $date_begin . "' AND '" . $date_end . " AND 
        the_Cueillettes.id_parcelle = ".$id_parcelle."'
        "
    );
    if (!verify_Interv_date($date_begin, $date_end)) {
        return "la première date est plus récente que l'autre";
    } else if (is_null($poids_cueillette[0]['SUM(poids_cueilli)'])) {
        return 0;
    } else {
        $retour = $poids_cueillette[0]['SUM(poids_cueilli)'];
    }
    return $retour;
}
function get_poids_cueillette($date_begin, $date_end)
{
    $retour = 0;
    $poids_cueillette = request_all(
        "SELECT SUM(poids_cueilli) 
        FROM the_Cueillettes 
        JOIN the_Parcelles ON the_Parcelles.id_parcelle = the_Cueillettes.id_parcelle 
        JOIN the_Varietes_de_the ON the_Varietes_de_the.id_variete = the_Parcelles.id_variete
        WHERE date_cueillette BETWEEN '" . $date_begin . "' AND '" . $date_end . "'
        "
    );
    if (!verify_Interv_date($date_begin, $date_end)) {
        return "la première date est plus récente que l'autre";
    } else if (is_null($poids_cueillette[0]['SUM(poids_cueilli)'])) {
        return 0;
    } else {
        $retour = $poids_cueillette[0]['SUM(poids_cueilli)'];
    }
    return $retour;
}



function cout_revient($date_begin, $date_end)
{
    $depense = request_all(
        "SELECT 
        SUM(poids_cueilli * montant_salaire_kg) AS salaire,
        SUM(poids_cueilli) AS poids_cueilli
    FROM 
        the_Cueillettes
    JOIN 
        the_Parcelles ON the_Parcelles.id_parcelle = the_Cueillettes.id_parcelle
    JOIN 
        the_Cueilleurs_salaires ON the_Cueilleurs_salaires.id_cueilleur = the_Cueillettes.id_cueilleur
    WHERE 
        date_cueillette BETWEEN '" . $date_begin . "' AND '" . $date_end . "'
    GROUP BY 
        the_Cueillettes.id_cueilleur
    "
    );

    if (is_null($depense)) {
        return "pas de cuillette à cette date";
    } else if (!verify_Interv_date($date_begin, $date_end)) {
        return "pas de cueillette entre ces deux dates";
    }

    $salaireTotal = 0;
    $sumPoidsCueillette = 0;
    for ($i = 0; $i < count($depense); $i++) {
        $salaireTotal += $depense[$i]['salaire'];
        $sumPoidsCueillette += $depense[$i]['poids_cueilli'];
    }

    // Assuming you have a defined function named 'select_all'
    $depenseTotal = select_all("the_view_depense");
    $revient = $salaireTotal + $depenseTotal[0]['total_depenses'];

    // Avoid division by zero
    if ($sumPoidsCueillette == 0) {
        return "La somme des poids de cueillette est nulle.";
    }

    return $revient / $sumPoidsCueillette;
}

function poids_restant_sur_parcelles($date_begin, $date_end)
{
    $lesParcelle = select_all('the_Parcelles');
    $poids_total_parcelle = 0;
    $poids_total_cueillette = get_poids_cueillette($date_begin, $date_end);
    if (!verify_number($poids_total_cueillette)) {
        return $poids_total_cueillette;
    }


    for ($i = 0; $i < count($lesParcelle); $i++) {
        $poids_total_parcelle += rendement_by_saison($lesParcelle[$i]['id_parcelle'], $date_begin, $date_end);
        //echo  get_rendement($lesParcelle[$i]['id_parcelle'],"2024-01-12")."\n";
    }
    $poids_restant = $poids_total_parcelle - $poids_total_cueillette;
    if ($poids_restant < 0 || !verify_Interv_date($date_begin, $date_end)) {
        return "pas assez de stocker mais avec trop de cueillette";
    }
    return $poids_restant;
}


function depense($date_begin, $date_end)
{
    $paiement = paiement_cueilleur($date_begin, $date_end);
    $paiement_value = 0;
    for ($i = 0; $i < count($paiement); $i++) {
        $paiement_value += $paiement[$i]['paiement'];
    }
    $depense  = select_all("the_view_depense");
    return $paiement_value + $depense[0]['total_depenses'];
}

function benefice($date_begin, $date_end)
{
    $montant = montant_vente($date_begin, $date_end);
    $depense = depense($date_begin, $date_end);
    if (!verify_number($montant)) {
        return $montant;
    }
    if (!verify_number($depense)) {
        return $depense;
    }
    return $montant - $depense;
}

function cout_revient_byKG($date_begin, $date_end)
{
    $paiement = depense($date_begin, $date_end);
    if (!verify_number($paiement)) {
        return $paiement;
    }
    $depense = request_all(
        "SELECT 
        SUM(poids_cueilli) AS poids_cueilli
        FROM the_Cueillettes
    WHERE 
        date_cueillette BETWEEN '" . $date_begin . "' AND '" . $date_end . "'
    "
    );
    if ($depense[0]['poids_cueilli'] == 0) {
        return 0;
    }
    return $paiement / $depense[0]['poids_cueilli'];
}
function montant_vente($date_begin, $date_end)
{
    $montant_vente = 0;
    $poids_cueillette = request_all(
        "SELECT 
        poids_cueilli,
        the_Parcelles.id_variete AS id_variete,
        prix_vente
        FROM the_Cueillettes 
        JOIN the_Parcelles ON the_Parcelles.id_parcelle = the_Cueillettes.id_parcelle 
        JOIN the_Varietes_de_the ON the_Varietes_de_the.id_variete = the_Parcelles.id_variete
        WHERE date_cueillette BETWEEN '" . $date_begin . "' AND '" . $date_end . "'
        "
    );
    if (!verify_Interv_date($date_begin, $date_end)) {
        return "la premiere date est plus recent que l'autre";
    } else if (!is_null($poids_cueillette)) {
        //return "pas de cueillette entre ses deux date";
    } else {
        for ($i = 0; $i < count($poids_cueillette); $i++) {
            $montant_vente += $poids_cueillette[$i]['poids_cueilli'] * $poids_cueillette[$i]['prix_vente'];
        }
    }
    return $montant_vente;
}

function bilan_general($date_begin, $date_end)
{
    $retour = array(
        'total_cueillette' => get_poids_cueillette($date_begin, $date_end),
        'poids_parcelle' => poids_restant_sur_parcelles($date_begin, $date_end),
        'vente' => montant_vente($date_begin, $date_end),
        'depense' => depense($date_begin, $date_end),
        'benefice' => benefice($date_begin, $date_end),
        'revient' => cout_revient_byKG($date_begin, $date_end)
    );
    return $retour;
}


function verify_admin($idUser)
{
    $users = select_all("the_Utilisateur");
    for ($i = 0; $i < count($users); $i++) {
        if ($users[$i]['id_utilisateur'] == $idUser) {
            if ($users[$i]['admin']) {
                return true;
            } else {
                return false;
            }
        }
    }
    return false;
}


function paiement_cueilleur($date_begin, $date_end)
{
    if (verify_Interv_date($date_begin, $date_end)) {
        $cuellette = request_all(
            "SELECT
            the_Cueilleurs.nom AS nom,
            date_cueillette,
            the_Cueillettes.id_cueilleur AS id_cueilleur,
            poids_cueilli AS poids_cueilli,
            montant_salaire_kg
        FROM 
            the_Cueillettes
        JOIN 
            the_Cueilleurs_salaires ON the_Cueilleurs_salaires.id_cueilleur = the_Cueillettes.id_cueilleur
        JOIN
            the_Cueilleurs ON the_Cueilleurs.id_cueilleur = the_Cueillettes.id_cueilleur
        WHERE 
            date_cueillette BETWEEN '" . $date_begin . "' AND '" . $date_end . "'
        "
        );

        $resultat = array();
        for ($i = 0; $i < count($cuellette); $i++) {
            $contrainte = select_by("the_Contrainte_Cueillette", "id_cueilleur = " . $cuellette[$i]['id_cueilleur']);
            $diffPoids = $cuellette[$i]['poids_cueilli'] - $contrainte[0]['poids_min'];

            $resultat[$i]['date'] = $cuellette[$i]['date_cueillette'];
            $resultat[$i]['nom_cueilleur'] = $cuellette[$i]['nom'];
            $resultat[$i]['poids'] = $cuellette[$i]['poids_cueilli'];
            $resultat[$i]['bonus'] = 0;
            $resultat[$i]['malus'] = 0;
            $resultat[$i]['paiement'] = 0;
            if ($diffPoids > 0) {
                $resultat[$i]['bonus'] = $contrainte[0]['bonus'];
                $resultat[$i]['paiement'] = $diffPoids * ($cuellette[$i]['montant_salaire_kg'] - $contrainte[0]['bonus']);
                $resultat[$i]['paiement'] += ($cuellette[$i]['poids_cueilli'] - $diffPoids) * ($cuellette[$i]['montant_salaire_kg'] + $contrainte[0]['bonus']);
            } elseif ($diffPoids < 0) {
                $resultat[$i]['malus'] = $contrainte[0]['malus'];
                $resultat[$i]['paiement'] = $cuellette[$i]['poids_cueilli'] * ($cuellette[$i]['montant_salaire_kg'] - $contrainte[0]['malus']);
            } else {
                $resultat[$i]['paiement'] = $cuellette[$i]['poids_cueilli'] * ($cuellette[$i]['montant_salaire_kg']);
            }
        }
        return $resultat;
    } else {
        return "pas de cueillette entre ces deux dates";
    }
}



function rendementBefore($date)
{
    $rdm = select_by("the_saison", "mois <= MONTH('" . $date . "') ORDER BY mois DESC LIMIT 1");
    if($rdm === null || empty($rdm)){
        return $date; 
    }
    $annee = date("Y", strtotime($date));
    return $annee . "-" . $rdm[0]['mois'] . "-01";
}


function prevision($date_end)
{
    $parcelles = request_all(
        "SELECT * from the_Parcelles 
        JOIN the_Varietes_de_the 
        ON the_Varietes_de_the.id_variete = the_Parcelles.id_variete
        "
    );
    $prevision = array();
    for ($i = 0; $i < count($parcelles); $i++) {
        $prevision[$i]['numero_parcelle'] = $parcelles[$i]['numero_parcelle'];
        $prevision[$i]['nom_variete'] = $parcelles[$i]['nom_variete'];
        $prevision[$i]['surface_hectare'] = $parcelles[$i]['surface_hectare'];
        $prevision[$i]['nbPied'] = intval($parcelles[$i]['surface_hectare'] * 10000 / $parcelles[$i]['occupation']);
        $prevision[$i]['poids_restant'] = poids_restant_sur_parcelles(rendementBefore($date_end), $date_end);
    }
    return $prevision;
}

function previsionGlobal($date_end)
{
    $parcelles = request_all(
        "SELECT * from the_Parcelles 
        JOIN the_Varietes_de_the 
        ON the_Varietes_de_the.id_variete = the_Parcelles.id_variete
        "
    );
    $prevision = array();
    $prevision['the_restant'] = 0;
    $prevision['montant'] = 0;
    for ($i = 0; $i < count($parcelles); $i++) {
        $poidsRestant = poids_restant_sur_parcelles(rendementBefore($date_end), $date_end);
        if (verify_number($poidsRestant)) {
            $prevision['the_restant'] += $poidsRestant;
            $prevision['montant'] += $poidsRestant * $parcelles[$i]['prix_vente'];
        }
    }
    return $prevision;
}

