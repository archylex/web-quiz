<?php

$host = "localhost";
$user = "root";
$password = "password";
$database = "quiz";

$mysqli = new mysqli($host, $user, $password, $database);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}