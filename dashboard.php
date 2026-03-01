<?php
session_start();

// Verificar sesión
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit;
}

require "php/config.php";

// Buscar naves si hay query de búsqueda
$busqueda = $_GET['busqueda'] ?? '';
$sql = "SELECT * FROM naves WHERE usuario_id = ? AND nombre LIKE ?";
$stmt = $conn->prepare($sql);
$likeBusqueda = "%$busqueda%";
$stmt->bind_param("is", $_SESSION['usuario_id'], $likeBusqueda);
$stmt->execute();
$resultado = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel - Naves</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>Bienvenido, <?= htmlspecialchars($_SESSION['usuario_nombre'] ?? 'Usuario') ?></h2>

<!-- Buscador por nombre -->
<form method="GET">
    <input type="text" name="busqueda" placeholder="Buscar por nombre" value="<?= htmlspecialchars($busqueda) ?>">
    <button type="submit">Buscar</button>
</form>

<!-- Botones -->
<a href="crear_nave.php">Crear Nueva Nave</a> |
<a href="php/logout.php">Cerrar Sesión</a>

<!-- Tabla de naves -->
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Nombre</th>
        <th>Nacionalidad</th>
        <th>Año</th>
        <th>Foto</th>
        <th>Vista</th>
    </tr>
    <?php while ($fila = $resultado->fetch_assoc()): ?>
    <tr>
        <td><?= htmlspecialchars($fila['nombre']) ?></td>
        <td><?= htmlspecialchars($fila['nacionalidad']) ?></td>
        <td><?= htmlspecialchars($fila['anio_construccion']) ?></td>
        <td>
            <?php if ($fila['foto']): ?>
                <img src="uploads/<?= htmlspecialchars($fila['foto']) ?>" width="50" alt="Foto de la nave">
            <?php endif; ?>
        </td>
        <td>
            <a href="vehicle_overview.php?id=<?= $fila['id'] ?>">Ver / Editar</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>