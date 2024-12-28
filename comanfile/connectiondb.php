<?php
$host = "localhost";
$hostname = "root";
$hostpassword = null;
$dbname = "mydisscius";
$conbd = new PDO("mysql:host=$host;dbname=$dbname",$hostname,$hostpassword);
$conbd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>