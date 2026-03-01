<?php
session_start();
require "config.php";

$correo = $_POST['correo'] ?? '';
$contrasena = $_POST['contraseña'] ?? '';

if ($correo && $contrasena) {


    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $usuario = $resultado->fetch_assoc();

    // Verificar datos
    if ($usuario && password_verify($contrasena, $usuario['password'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nombre'] = $usuario['name'];
        header("Location: ../dashboard.php");
        exit;
    } else {
        echo "Correo o contraseña incorrectos.";
    }

    // Cerrar statement y conexión
    $stmt->close();
    $conn->close();
}
?>