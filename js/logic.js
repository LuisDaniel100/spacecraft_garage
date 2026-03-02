document.addEventListener("DOMContentLoaded", function () {

    const login = document.getElementById("form_login");
    const registro = document.getElementById("form_registro");
    const btnMostrarRegistro = document.getElementById("mostrar_registro");
    const btnMostrarLogin = document.getElementById("mostrar_login");


    if (!login || !registro) return;


    if (btnMostrarRegistro) {
        btnMostrarRegistro.addEventListener("click", function () {
            login.style.display = "none";
            registro.style.display = "block";
        });
    }


    if (btnMostrarLogin) {
        btnMostrarLogin.addEventListener("click", function () {
            registro.style.display = "none";
            login.style.display = "block";
        });
    }


    registro.addEventListener("submit", function (event) {
        const contrasena = registro.querySelector("input[name='contrasena']").value;
        const confirmar = registro.querySelector("input[name='confirmar_contrasena']").value;

        if (contrasena !== confirmar) {
            event.preventDefault();
            alert("Las contraseñas no coinciden");
        }
    });

});