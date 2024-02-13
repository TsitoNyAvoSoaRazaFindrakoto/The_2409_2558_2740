<?php

include "../inc/fonction_base.php";

$data = $_REQUEST;

$real = array();

foreach ($data as $key => $value) {
	if ($key === "table" || $key === "column" || $key === "id") {
		continue;
	}
	$real[$key] = $value;
}

// var_dump($data);
$update = update($data['table'], $real, $data['column'] . "=" . $data['id']);

if ($update == 0) {
	// echo $update;
	header("Location:list-entities.php?table=" . $data['table']);
} else {
	echo '<script>';
	echo 'window.history.back();'; // JavaScript code to go back to the previous page
	echo '</script>';
}