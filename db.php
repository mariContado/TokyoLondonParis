<?php
$host     = "localhost";
$user     = "root";
$password = "";
$dbname   = "wishkolang";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Database connection failed. Please try again later.");
}
?>
