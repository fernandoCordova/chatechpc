<?php

// Connection variables 
$host = "localhost"; // host
$user = "root"; // usuario de la base de datos
$password = ""; // contraseña del usuario de la base de datos
$database = "julio"; // nombre de la base de datos

// Conectarse con MySql
$conexion = new mysqli($host, $user, $password, $database);

// Verificar conexion
if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}
