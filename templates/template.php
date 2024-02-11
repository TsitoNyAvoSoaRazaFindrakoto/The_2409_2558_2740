<?php

include("head.php");


$page = "";
if(isset($_GET["page"])) {
    $page = "../pages/" . $_GET["page"] . ".php";
    include($page);
}

include("end.php");

?>