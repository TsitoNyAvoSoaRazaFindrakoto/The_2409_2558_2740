<?php 
include_once 'fonction_base.php';

function get_rendement_by_month($id_parcelle){
    $retour = null;
    $parcelle = select_by("the_Parcelles","id_parcelle = ".$id_parcelle);
    if ($parcelle[0] != null) {
        $the_variete = select_by("the_Varietes_de_the","id_variete = ".$parcelle[0]['id_variete']);
        $retour = intval($parcelle[0]['surface_hectare'] * 10000 / $the_variete[0]['occupation']);
        $retour = $retour * $the_variete[0]['rendement_par_pied'];
    }
    else{
        echo "parcelle pas de resultat";
    }
    return $retour;
}

function get_rendement($id_parcelle,$date_cueillette){
    $retour = null;
    $rendement_by_month = get_rendement_by_month($id_parcelle);
    /*$plantation = select_by("the_Plantations","id_parcelle = ".$id_parcelle);
    $date_plantation = $plantation[0]['date_plantation'];

    $diff = $date_plantation->diff($date_cueillette);
    // nombre de mois 
    $nombre_de_mois = $diff->format('%m');*/
    return 1*$rendement_by_month;
}

function verify_cueillette($id_parcelle,$data){
    $retour = null;
    $rdm = get_rendement($id_parcelle,"2024-02-12");
    if ($rdm<$data['poids_cueilli']) {
        return false;
    }
    else{
        insert("the_Cueillettes",$data);
        return true;
    }
}

function get_poids_cueillette(){
    return request_all("select sum(poids_cueilli) from the_Cueillettes join the_parcelles on the_parcelles.id_parcelle = the_Cueillettes.id_cueillette join the_Varietes_de_the  on the_Varietes_de_the.id_variete = the_parcelles.id_variete")[0]['sum(poids_cueilli)'];
}

function cout_revient(){
    $depense = request_all("select sum(poids_cueilli),sum(montant_salaire_kg) from the_Cueillettes join the_parcelles on the_parcelles.id_parcelle = the_Cueillettes.id_cueillette join the_Varietes_de_the  on the_Varietes_de_the.id_variete = the_parcelles.id_variete join the_Cueilleurs_salaires on the_Cueilleurs_salaires.id_cueilleur = the_Cueillettes.id_cueilleur");
    $salaireTotal = $depense[0]['sum(poids_cueilli)'] * $depense[0]['sum(montant_salaire_kg)'];

    $depenseTotal = select_all("the_view_depense");
    $revient = $salaireTotal + $depenseTotal[0]['total_depenses'];
    return $revient/$depense[0]['sum(poids_cueilli)'];
}

function poids_restant_sur_parcelles(){
    $lesParcelle = select_all('the_Parcelles');
    $poids_total_parcelle = 0;
    for ($i=0; $i < count($lesParcelle); $i++) { 
        $poids_total_parcelle += get_rendement($lesParcelle[$i]['id_parcelle'],"2024-01-12");
        //echo  get_rendement($lesParcelle[$i]['id_parcelle'],"2024-01-12")."\n";
    }
    return $poids_total_parcelle - get_poids_cueillette();
}



