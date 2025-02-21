<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbn = "Project_IT6";

try {
    $conn = new mysqli($servername, $username, $password, $dbn);
} catch (\Exception $e) {
    die($e);
}
