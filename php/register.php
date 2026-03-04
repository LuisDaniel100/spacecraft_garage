<?php
require "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre = $_POST["nombre"] ?? "";
    $correo = $_POST["correo"] ?? "";
    $contrasena = $_POST["contrasena"] ?? ""; 
    $confirmar = $_POST["confirmar_contrasena"] ?? "";

    if ($contrasena !== $confirmar) {
        header("Location: ../index.php?registro=error");
        exit;
    }

    $contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (nombre, email, contrasena) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $correo, $contrasenaHash);

    if ($stmt->execute()) {
        header("Location: ../index.php?registro=exito");
        exit;
    } else {
        header("Location: ../index.php?registro=error");
        exit;
    }

    $stmt->close();
    $conn->close();
}
?>