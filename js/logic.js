document.addEventListener("DOMContentLoaded", function () {

    const formularioLogin = document.getElementById("form_login");
    const formularioRegistro = document.getElementById("form_registro");
    const mostrarRegistro = document.getElementById("mostrar_registro");
    const mostrarLogin = document.getElementById("mostrar_login");

    // Si no existe el formulario de login, no hacemos nada
    if (!formularioLogin || !formularioRegistro) {
        return;
    }

    // Mostrar registro
    if (mostrarRegistro) {
        mostrarRegistro.onclick = function () {
            formularioLogin.classList.remove("activo");
            formularioRegistro.classList.add("activo");
        };
    }

    // Mostrar login
    if (mostrarLogin) {
        mostrarLogin.onclick = function () {
            formularioRegistro.classList.remove("activo");
            formularioLogin.classList.add("activo");
        };
    }

    // Validación de contraseñas
    formularioRegistro.addEventListener("submit", function (event) {
        const contrasena = formularioRegistro.querySelector("input[name='contrasena']").value;
        const confirmar = formularioRegistro.querySelector("input[name='confirmar_contrasena']").value;

        if (contrasena !== confirmar) {
            event.preventDefault();
            alert("Las contraseñas no coinciden");
        }
    });

});