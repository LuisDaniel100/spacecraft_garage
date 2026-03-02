<?php

$host = "";
$dbname = "";
$user = "u529436459_luis";
$pass = ""; 


$conn = new mysqli($host, $user, $pass, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    contrasena VARCHAR(255) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";


if ($conn->query($sql) === TRUE) {
    echo "Tabla 'users' creada correctamente";
} else {
    echo "Error al crear la tabla: " . $conn->error;
}

$conn->close();
?>