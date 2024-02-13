<?php

include_once "../../inc/fonction_base.php";

$data = $_POST;

var_dump($data);

$id = $data['id_variete'];

delete_from("the_Saison","id_variete=".$id);

foreach ($data['mois'] as $key => $value) {
	$object['mois']=$value;
	$object['id_variete']=$id;
	insert("the_saison",$object);
};

header("Location:../home.php");