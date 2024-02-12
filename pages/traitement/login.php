<?php

include_once "../../inc/fonctionLogin.php";

$uname = $_POST['uname'];
$pwd = $_POST['pwd'];

$id = checkLogin($uname ,$pwd);

if($id>0){
	session_start();
	$_SESSION['id']=$id;
	header("Location:../home.php");
} else {
	header("Location:../sign-in.php?error=1");
}

