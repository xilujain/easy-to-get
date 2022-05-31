<?php
$dbHost = "localhost:3308";
$dbUser = "root";
$dbPass = "Wmnkdr123";
$dbName = "etg";

try {
    $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
} catch (Exception $e) {
    echo $e->getMessage();
    exit();
}