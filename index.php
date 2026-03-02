<?php 
session_start(); 

// Si ya está logueado, lo mandamos al dashboard
if (isset($_SESSION["usuario_id"])) {
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Spacecraft</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div id="tarjeta_login">

    <!-- FORMULARIO LOGIN -->
    <form id="form_login" class="formulario_autenticacion activo" method="POST" action="php/login.php">

        <h3>Bienvenido</h3>

        <input type="email" name="correo" placeholder="Correo electrónico" required>
        <input type="password" name="contrasena" placeholder="Contraseña" required>

        <button type="submit">Iniciar Sesión</button>

        <p>
            ¿No tienes cuenta?
            <span id="mostrar_registro" class="enlace">Registrarse</span>
        </p>

    </form>

    <!-- FORMULARIO REGISTRO -->
    <form id="form_registro" class="formulario_autenticacion" method="POST" action="php/register.php">

        <h3>Crear Cuenta</h3>

        <input type="text" name="nombre" placeholder="Nombre completo" required>
        <input type="email" name="correo" placeholder="Correo electrónico" required>
        <input type="password" name="contrasena" placeholder="Contraseña" required minlength="8">
        <input type="password" name="confirmar_contrasena" placeholder="Confirmar Contraseña" required>

        <button type="submit">Crear Cuenta</button>

        <button type="button" id="mostrar_login" class="boton">Iniciar Sesión</button>

    </form>

</div>

<script src="js/logic.js"></script>
</body>
</html>