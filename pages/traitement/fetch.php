<?php

header("Content-Type: application/json");
include "../../inc/php/functions.php";
$func_Key = "action";
$data = array();
$realData = array();

$data = $_GET;

foreach ($data as $key => $value) {
	if ($key == $func_Key) {
		continue;
	} else {
		$realData[$key] = $value;
	}
}
// echo $data[$func_Key];

$result = array();

if (function_exists($data[$func_Key])) {
	// Call the function using variable functions
	$result = call_user_func($data[$func_Key], $realData);

} else {
	$result = $data[$func_Key]."  does not exist";
}


// echo $result['result'];
echo json_encode($result);