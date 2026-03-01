<?php
require "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre = $_POST["nombre"] ?? "";
    $correo = $_POST["correo"] ?? "";
    $contrasena = $_POST["contraseña"] ?? "";
    $confirmar = $_POST["confirmar_contraseña"] ?? "";


    if ($contrasena !== $confirmar) {
        die("Las contraseñas no coinciden");
    }


    $contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT);


    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $correo, $contrasenaHash);

    if ($stmt->execute()) {
        echo "Usuario registrado correctamente";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Cerrar conexiones
    $stmt->close();
    $conn->close();
}
?>