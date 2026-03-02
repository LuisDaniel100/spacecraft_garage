<?php

$host = "srv1349.hstgr.io";
$database = "u529436459_luis";
$user = "u529436459_luis";
$password = "a^!N6Ec#"; 


$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}