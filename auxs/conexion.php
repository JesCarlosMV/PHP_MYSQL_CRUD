<?php // conexion con la bbdd megatiendabbdd en mysql

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "megatiendabbdd";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}


?>