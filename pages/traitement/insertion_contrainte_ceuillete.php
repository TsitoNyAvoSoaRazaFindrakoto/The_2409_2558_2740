<?php

include_once "../../inc/fonction_base.php";

$data = $_POST;

var_dump($data);

$id = $data['id_cueilleur'];

delete_from("the_contrainte_cueillette","id_cueilleur=".$id);

insert("the_contrainte_cueillette",$data);

header("Location:../home.php");