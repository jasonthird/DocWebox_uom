<?php

$hostname = 'localhost';
$username = 'your_username';
$password = 'your_password';
$database = 'your_database';

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>