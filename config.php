
<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$dsn = "pgsql:host=localhost;dbname=ProjetoCatalogo";
$pdo = new PDO($dsn, 'postgres', '1234', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);