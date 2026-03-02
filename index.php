<?php
session_start();

if (isset($_SESSION["usuario_id"])) {
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Autenticación</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php if (isset($_GET['registro']) && $_GET['registro'] === 'exito'): ?>
    <div class="mensaje_exito">
        Cuenta creada con éxito. Ahora puedes iniciar sesión.
    </div>
<?php endif; ?>

<?php if (isset($_GET['registro']) && $_GET['registro'] === 'error'): ?>
    <div class="mensaje_error">
         Ocurrió un error al registrar. Intenta nuevamente.
    </div>
<?php endif; ?>

<!-- FORMULARIO LOGIN -->
<form id="form_login" method="POST" action="php/login.php">
    <h3>Iniciar Sesión</h3>

    <input type="email" name="correo" placeholder="Correo electrónico" required>
    <input type="password" name="contrasena" placeholder="Contraseña" required>

    <button type="submit">Entrar</button>

    <p>
        ¿No tienes cuenta?
        <span id="mostrar_registro">Regístrate</span>
    </p>
</form>

<!-- FORMULARIO REGISTRO -->
<form id="form_registro" method="POST" action="php/register.php" style="display:none;">
    <h3>Crear Cuenta</h3>

    <input type="text" name="nombre" placeholder="Nombre completo" required>
    <input type="email" name="correo" placeholder="Correo electrónico" required>
    <input type="password" name="contrasena" placeholder="Contraseña" required minlength="8">
    <input type="password" name="confirmar_contrasena" placeholder="Confirmar Contraseña" required>

    <button type="submit">Registrarse</button>

    <p>
        ¿Ya tienes cuenta?
        <span id="mostrar_login">Inicia sesión</span>
    </p>
</form>

<script src="js/logic.js"></script>

</body>
</html>