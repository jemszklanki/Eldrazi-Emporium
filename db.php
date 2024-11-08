<?php
// Baza danych
$servername = "mysql.ct8.pl";
$username = "m50637_root";
$password = "S7!1277//P455W0:*qkl5";
$dbname = "m50637_emporium";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>