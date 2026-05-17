<?php

$servidor = "sql309.infinityfree.com";
$usuario = "if0_41948221";
$password = "rcw2ODtB0jJX";
$base_datos = "if0_41948221_escape_room";

$conexion = new mysqli($servidor, $usuario, $password, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$conexion->set_charset("utf8mb4");

?>