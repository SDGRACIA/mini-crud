<?php
// Conexión a la base de datos
include("conexion.php");

// Hacemos la consulta
$consulta = $conexion->query("SELECT * FROM usuarios");

// Comprobamos errores en la consulta (opcional pero útil)
if (!$consulta) {
    die("Error en la consulta: " . $conexion->error);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRUD PHP</title>
    <link rel="stylesheet" href="Estilos.css">
</head>
<body>
    <h2>Lista de usuarios</h2>

    <div class="barra">
        <button class="btn" onclick="document.getElementById('modalCrear').style.display='flex'">
            Nuevo usuario
        </button>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cédula</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>

        <?php while ($row = $consulta->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nombre'] ?></td>
            <td><?= $row['cedula'] ?></td>
            <td><?= $row['telefono'] ?></td>
            <td><?= $row['correo'] ?></td>
            <td>
                <a href="Editar.php?id=<?= $row['id'] ?>" class="btn">Editar</a>
                <a href="Eliminar.php?id=<?= $row['id'] ?>" class="btn">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <!-- Modal para crear usuario -->
    <div id="modalCrear" class="modal">
        <div class="modal-content">
            <h3>Nuevo usuario</h3>
            <form method="POST" action="crear.php">
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="text" name="cedula" placeholder="Cédula" required>
                <input type="text" name="telefono" placeholder="Teléfono" required>
                <input type="email" name="correo" placeholder="Correo" required>
                <button type="submit" class="btn">Guardar</button>
            </form>
        </div>
    </div>

    <script>
        // Cerrar modal haciendo clic fuera
        window.addEventListener("click", function(e){
            var modal = document.getElementById("modalCrear");
            if (e.target === modal) {
                modal.style.display = "none";
            }
        });
    </script>
</body>
</html>