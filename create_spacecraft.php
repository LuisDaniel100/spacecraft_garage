<?php
session_start();
if(!isset($_SESSION['usuario_id'])){
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Nave </title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="dashboard">

<header class="top-header">
    <h1>Crear Nueva Nave</h1>
</header>

<form class="space-form" method="POST" action="php/spacecraft_action.php" enctype="multipart/form-data">
    <label>Nombre de la Nave:</label>
    <input type="text" name="nombre" placeholder="Nombre de la Nave" required>

    <label>Nacionalidad:</label>
    <input type="text" name="nacionalidad" placeholder="Nacionalidad" required>

    <label>Año de Construcción:</label>
    <input type="number" name="anio_construccion"
           placeholder="Año de Construcción"
           min="1900"
           max="<?= date('Y') ?>"
           required>

    <label>Foto (opcional):</label>
    <input type="file" name="foto" accept="image/*">

    <button type="submit">Crear Nave</button>
</form>

</body>
</html>