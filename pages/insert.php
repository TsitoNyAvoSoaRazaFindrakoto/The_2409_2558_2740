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

if (insert($data['table'], $real) == 0) {
	header("Location:list-entities.php?table=" . $data['table']);
} else {
	echo '<script>';
	echo 'window.history.back();'; // JavaScript code to go back to the previous page
	echo '</script>';
}