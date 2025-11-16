<?php
include("conexion.php");

$id = $_GET['id'];
$datos = $conexion->query("SELECT * FROM usuarios WHERE id=$id")->fetch_assoc();

if(isset($_POST['guardar'])){
    $n = $_POST['nombre'];
    $d = $_POST['cedula'];
    $t = $_POST['telefono'];
    $c = $_POST['correo'];

    $conexion->query("
        UPDATE usuarios SET
        nombre='$n',
        cedula='$d',
        telefono='$t',
        correo='$c'
        WHERE id=$id
    ");

    header("Location: CRUD.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar usuario</title>
    <link rel="stylesheet" href="Estilos.css">
</head>
<body>

<h2>Editar usuario</h2>

<form method="POST">
    <input type="text" name="nombre" value="<?= $datos['nombre'] ?>" required>
    <input type="text" name="cedula" value="<?= $datos['cedula'] ?>" required>
    <input type="text" name="telefono" value="<?= $datos['telefono'] ?>">
    <input type="email" name="correo" value="<?= $datos['correo'] ?>">

    <button name="guardar" class="btn">Guardar cambios</button>
</form>

</body>
</html>
