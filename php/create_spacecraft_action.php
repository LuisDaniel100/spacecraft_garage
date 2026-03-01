<?php
session_start();
require "config.php";

// Verificar que el usuario esté logueado
if(!isset($_SESSION['usuario_id'])){
    header("Location: ../index.php");
    exit;
}


if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nombre = $_POST['nombre'] ?? '';
    $nacionalidad = $_POST['nacionalidad'] ?? '';
    $anio_construccion = $_POST['anio_construccion'] ?? '';

    // Procesar foto subida
    $foto = null;
    if(isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK){
        $tmpNombre = $_FILES['foto']['tmp_name'];
        $nombreFoto = time() . '_' . basename($_FILES['foto']['name']);
        move_uploaded_file($tmpNombre, '../uploads/' . $nombreFoto);
        $foto = $nombreFoto;
    }


    $stmt = $conn->prepare("INSERT INTO spacecrafts (user_id, name, nationality, build_year, photo) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issis", $_SESSION['usuario_id'], $nombre, $nacionalidad, $anio_construccion, $foto);
    $stmt->execute();

    // Redirigir al dashboard
    header("Location: ../dashboard.php");
    exit;
}
?>