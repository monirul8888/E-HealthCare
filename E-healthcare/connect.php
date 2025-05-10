<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "HealthCare";

$connection = new mysqli($serverName, $userName, $password, $dbName);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} else {
    echo "Connected successfully to the database.";
}
?>
