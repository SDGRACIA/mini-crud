<?php
include("conexion.php");

$n = $_POST['nombre'];
$d = $_POST['cedula'];
$t = $_POST['telefono'];
$c = $_POST['correo'];

$conexion->query("
    INSERT INTO usuarios(nombre, cedula, telefono, correo)
    VALUES ('$n','$d','$t','$c')
");

header("Location: CRUD.php");
?>