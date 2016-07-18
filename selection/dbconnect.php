<?php

$dbhost = "";
$dbuser = "";
$dbpass = "";
$dbname = "";

$pdo = new PDO("mysql:host=".$dbhost.";dbname=". $dbname, $dbuser, $dbpass);

?>