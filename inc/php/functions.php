<?php

function addition($nomber) {
    $value["result"] = 0;
    foreach ($nomber as $key => $res) {
        $value["result"] += (int)$res; // Convert $res to integer before addition
    }
    return $value;
}