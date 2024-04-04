<?php

$servername = "localhost";
$username = "root";
$password = "123123123";
$database = "developer";

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Conexiune eșuată: " . $conn->connect_error);
}
?>