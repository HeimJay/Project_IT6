<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbn = "it6project2";

try {
    $conn = new mysqli($servername, $username, $password, $dbn);
} catch (\Exception $e) {
    die($e);
}
