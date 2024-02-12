<?php

header("Content-Type: application/json");
include_once "../../inc/fonction_base.php";
$func_Key = "action";
$table = "table";
$data = array();
$realData = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$data = $_POST;
} else {
	$data = $_GET;
}

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
	if (isset($data[$table])) {
		$result = call_user_func($data[$func_Key],$data[$table], $realData);
	} else{
		$result = call_user_func($data[$func_Key],$realData);
	}

} else {
	$result = "function ".$data[$func_Key]."  does not exist";
}

// echo $result['result'];
echo json_encode($result);