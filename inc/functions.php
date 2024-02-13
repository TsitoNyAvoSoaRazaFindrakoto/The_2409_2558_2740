<?php
include_once("connection.php");
include_once("fonction_base.php");
include_once("fonction_traitement.php");
include_once("fonction_donne.php");

function check_cueillette($data)
{
	if (verify_cueillette($data))
		return 1;
	return 0;
}

function bilan($data)
{
	return bilan_general($data['initial'], $data['final']);
}

function paiement($data)
{
	return paiement_cueilleur($data['initial'], $data['final']);
}

function PREVISION2($date){
	return prevision($date['end']);
}

function PREVGLOBAL2($date){
	return previsionGlobal($date['end']);
}