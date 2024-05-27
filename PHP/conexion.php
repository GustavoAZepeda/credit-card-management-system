<?php
$servername = "localhost";
$username = "root";
$password = "System22";
$dbname = "Proyecto_TC";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
