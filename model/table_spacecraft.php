<?php

$host = "";
$dbname = "";
$user = "u529436459_luis";
$pass = ""; 


$conn = new mysqli($host, $user, $pass, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "CREATE TABLE naves (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    nacionalidad VARCHAR(100) NOT NULL,
    anio_construccion INT NOT NULL,
    foto VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";


if ($conn->query($sql) === TRUE) {
    echo "Tabla 'naves' creada correctamente";
} else {
    echo "Error al crear la tabla: " . $conn->error;
}

$conn->close();
?>