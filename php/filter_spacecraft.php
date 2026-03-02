<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit;
}

require "php/config.php";


$filtro_nombre = isset($_GET['filtro_nombre']) ? $_GET['filtro_nombre'] : '';


$sql = "SELECT * FROM naves";


if (!empty($filtro_nombre)) {
    $sql .= " WHERE nombre LIKE ?";
}


$stmt = $conn->prepare($sql);

if (!empty($filtro_nombre)) {

    $filtro_nombre = "%$filtro_nombre%";
    $stmt->bind_param("s", $filtro_nombre);
}

$stmt->execute();
$resultado = $stmt->get_result();

if (!$resultado) {
    die("Error en la consulta: " . $conn->error);
}
?>