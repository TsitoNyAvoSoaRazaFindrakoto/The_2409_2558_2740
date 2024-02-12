<?php
include_once 'fonction_base.php';

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

function get_rendement($id_parcelle, $date_begin, $date_end)
{
    if (!verify_Interv_date($date_begin, $date_end)) {
        return false;
    }
    // Récupérer le rendement mensuel par pied
    $rendement_by_month = get_rendement_by_month($id_parcelle);

    $date_beginD = new DateTime('2023-05-10');
    $date_endD = new DateTime('2023-07-10');

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

    $rdm = get_rendement_by_month($data['id_parcelle']) - get_cueillette_Month($data['date_cueillette']);

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

function get_poids_cueillette($date_begin, $date_end)
{
    $poids_cueillette = request_all(
        "SELECT SUM(poids_cueilli) 
        FROM the_Cueillettes 
        JOIN the_Parcelles ON the_Parcelles.id_parcelle = the_Cueillettes.id_parcelle 
        JOIN the_Varietes_de_the ON the_Varietes_de_the.id_variete = the_Parcelles.id_variete
        WHERE date_cueillette BETWEEN '" . $date_begin . "' AND '" . $date_end . "'
        "
    );
    if (!is_null($poids_cueillette[0]['SUM(poids_cueilli)']) || !verify_Interv_date($date_begin, $date_end)) {
        return $poids_cueillette[0]['SUM(poids_cueilli)'];
    } else {
        return false; // Retourne 0 si la somme est NULL
    }
}


function cout_revient($date_begin, $date_end)
{
    $depense = request_all(
        "SELECT 
        SUM(poids_cueilli) AS poids_total_cueillette,
        SUM(montant_salaire_kg) AS montant_total_salaire
        FROM 
        the_Cueillettes
        JOIN 
        the_Parcelles ON the_Parcelles.id_parcelle = the_Cueillettes.id_parcelle
        JOIN 
        the_Varietes_de_the ON the_Varietes_de_the.id_variete = the_Parcelles.id_variete
        JOIN 
        the_Cueilleurs_salaires ON the_Cueilleurs_salaires.id_cueilleur = the_Cueillettes.id_cueilleur
        WHERE date_cueillette BETWEEN '" . $date_begin . "' AND '" . $date_end . "'
        "
    );

    if (is_null($depense[0]['poids_total_cueillette']) || !verify_Interv_date($date_begin, $date_end)) {
        return false;
    }

    $salaireTotal = $depense[0]['poids_total_cueillette'] * $depense[0]['montant_total_salaire'];

    $depenseTotal = select_all("the_view_depense");
    $revient = $salaireTotal + $depenseTotal[0]['total_depenses'];
    return $revient / $depense[0]['poids_total_cueillette'];
}

function poids_restant_sur_parcelles($date_begin, $date_end)
{
    $lesParcelle = select_all('the_Parcelles');
    $poids_total_parcelle = 0;
    $poids_total_cueillette = get_poids_cueillette($date_begin, $date_end);


    for ($i = 0; $i < count($lesParcelle); $i++) {
        $poids_total_parcelle += get_rendement($lesParcelle[$i]['id_parcelle'], $date_begin, $date_end);
        //echo  get_rendement($lesParcelle[$i]['id_parcelle'],"2024-01-12")."\n";
    }
    $poids_restant = $poids_total_parcelle - $poids_total_cueillette;
    if ($poids_restant < 0 || !verify_Interv_date($date_begin, $date_end)) {
        return false;
    }
    return $poids_restant;
}

function bilan_general($dates)
{
    $date_begin = $dates["initial"];
    $date_end = $dates["final"];
    $retour = array(
        'total_cueillette' => get_poids_cueillette($date_begin, $date_end),
        'poids_parcelle' => poids_restant_sur_parcelles($date_begin, $date_end),
        'revient' => cout_revient($date_begin, $date_end)
    );
    return $retour;
}
