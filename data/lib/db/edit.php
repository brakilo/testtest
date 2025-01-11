<?php


require_once("./Database.php");

$cipher = new cipherData();

$m = ".";

echo $cipher->encryptData($m);