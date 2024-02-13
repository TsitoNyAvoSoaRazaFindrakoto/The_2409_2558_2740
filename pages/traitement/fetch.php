<?php

header("Content-Type: application/json");
include_once "../../inc/fonction_base.php";
include_once "../../inc/fonction_traitement.php";
include_once "../../inc/fonction_donne.php";
include_once "../../inc/functions.php";
$func_Key = "action";
$table = "table";
$data = array();
$realData = array();

	$data = $_REQUEST;


foreach ($data as $key => $value) {
	if ($key == $func_Key || $key == $table) {
		continue;
	} else {
		$realData[$key] = $value;
	}
}
// echo $data[$func_Key];

$result = array();

if (function_exists($data[$func_Key])) {
	// Call the function using variable functions
	if (isset($data[$table]) && count($realData) > 0) {
		$result = call_user_func($data[$func_Key],$data[$table], $realData);
	} else if(count($realData) > 0 && !isset($data[$table])){
		$result =  call_user_func($data[$func_Key],$realData);
	} else if (count($realData) == 0 && isset($data[$table])) {
		$result =  call_user_func($data[$func_Key],$data[$table]);
	}

} else {
	$result = "function ".$data[$func_Key]."  does not exist";
}

// var_dump ($result);
// echo $result['result'];
echo json_encode($result);