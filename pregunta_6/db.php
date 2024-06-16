<?php
$host = 'localhost';
$dbname = 'examen_1';
$username = 'root';
$password = 'Caguaya99';

$conn = new mysqli('localhost', $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
