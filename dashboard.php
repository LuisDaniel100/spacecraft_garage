<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit;
}

require "php/config.php";
require "php/filter_spacecraft.php";  // Asumiendo que esta es la parte de la consulta SQL

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Naves</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="dashboard">

<header class="top-header">
    <h1>Bienvenido, <?= htmlspecialchars($_SESSION['usuario_nombre'] ?? 'Usuario') ?> </h1>
</header>

<div class="dashboard-container">
    <!-- Botones de acción -->
    <div class="dashboard-actions">
        <a href="create_spacecraft.php">Crear Nave</a>
        <a href="php/logout.php">Cerrar Sesión</a>

    </div>

    <!-- Tabla de naves -->
    <table class="dashboard-table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Nacionalidad</th>
                <th>Año</th>
                <th>Foto</th>
                <th>Vista</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($resultado->num_rows > 0): ?>
                <?php while ($fila = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($fila['nombre']) ?></td>
                        <td><?= htmlspecialchars($fila['nacionalidad']) ?></td>
                        <td><?= htmlspecialchars($fila['anio_construccion']) ?></td>
                        <td>
                            <?php if (!empty($fila['foto'])): ?>
                                <img src="uploads/<?= htmlspecialchars($fila['foto']) ?>" width="50" alt="Foto">
                            <?php else: ?>
                                Sin imagen
                            <?php endif; ?>
                        </td>
                        <td>
                           <a href="javascript:void(0);">Ver / Editar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No hay naves registradas.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>

</body>
</html>