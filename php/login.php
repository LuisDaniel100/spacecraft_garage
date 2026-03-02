<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "config.php";

$correo = $_POST['correo'] ?? '';
$contrasena = $_POST['contrasena'] ?? '';

if ($correo && $contrasena) {

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    if(!$stmt){
        die("Error en prepare: " . $conn->error);
    }
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $usuario = $resultado->fetch_assoc();

    if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nombre'] = $usuario['nombre'];
        header("Location: ../dashboard.php");
        exit;
    } else {       
    header("Location: ../index.php?error=1");       
    }

    $stmt->close();
    $conn->close();
}
?>