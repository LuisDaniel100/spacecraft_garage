document.addEventListener("DOMContentLoaded", function () {

    const formularioLogin = document.getElementById("loginForm");
    const formularioRegistro = document.getElementById("registerForm");

    const mostrarRegistro = document.getElementById("showRegister");
    const mostrarLogin = document.getElementById("showLogin");

    // Mostrar formulario de registro
    mostrarRegistro.addEventListener("click", function () {
        formularioLogin.classList.remove("active");
        formularioRegistro.classList.add("active");
    });

    // Mostrar formulario de login
    mostrarLogin.addEventListener("click", function () {
        formularioRegistro.classList.remove("active");
        formularioLogin.classList.add("active");
    });

    // Validación de contraseñas al registrar
    formularioRegistro.addEventListener("submit", function (event) {
        const contrasena = formularioRegistro.querySelector("input[name='contraseña']").value;
        const confirmarContrasena = formularioRegistro.querySelector("input[name='confirmar_contraseña']").value;

        if (contrasena !== confirmarContrasena) {
            event.preventDefault(); 
            alert("Las contraseñas no coinciden");
        }
    });

});