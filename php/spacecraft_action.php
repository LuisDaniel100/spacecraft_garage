<?php
session_start();


if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../index.php");
    exit;
}


require "config.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    $nombre = $_POST['nombre'];
    $nacionalidad = $_POST['nacionalidad'];
    $anio_construccion = $_POST['anio_construccion'];
    
//imagen
    $foto = null;
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
       
        $directorio = "../uploads/";
        $nombre_archivo = basename($_FILES['foto']['name']);
        $ruta_destino = $directorio . $nombre_archivo;

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_destino)) {
            $foto = $nombre_archivo; 
        } else {
            echo "Error al cargar la imagen.";
            exit;
        }
    }


    $sql = "INSERT INTO naves (nombre, nacionalidad, anio_construccion, foto, usuario_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error en la consulta: " . $conn->error);
    }


    $stmt->bind_param("ssisi", $nombre, $nacionalidad, $anio_construccion, $foto, $_SESSION['usuario_id']);

    // Ejecutar consulta
    if ($stmt->execute()) {
        
        header("Location: ../dashboard.php");
        exit;
    } else {
        echo "Error al crear la nave: " . $stmt->error;
    }


    $stmt->close();
}
?>