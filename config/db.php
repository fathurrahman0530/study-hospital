<?php

ini_set('display_errors', 1);
ini_get('display_startup_errors', 1);

error_reporting(E_ALL);

$hostname = "localhost";
$username = "root";
$password = "";
$database = "db_hospital";

try {
  $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Error : " . $e->getMessage();
}

header('Content-Type: application/json');