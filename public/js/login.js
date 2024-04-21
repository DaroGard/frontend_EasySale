document.addEventListener('DOMContentLoaded', function() {
    
    document.getElementById("iniciarSesion").addEventListener("click", function() {
        document.forms[0].submit(); // Envía el formulario
    });

    function loginData() {
        let email = document.getElementById("email").value;
        let password = document.getElementById("password").value;

        // Validación de correo electrónico
        if (!validarCorreo(email)) {
            alert("Por favor, ingresa un correo electrónico válido.");
            return;
        }

        // Crea un objeto JSON con los datos
        let usuario = { email, password };

        localStorage.setItem('usuario', JSON.stringify(usuario));

        // Muestra los datos almacenados en la consola del navegador
        console.log('Datos del usuario registrado:', JSON.parse(localStorage.getItem('usuario')));


    }

    function validarCorreo(email) {
        // Patrón de validación de correo electrónico
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailPattern.test(email);
    }

    // Evento onclick para el botón "Sign in"
    document.getElementById("iniciarSesion").addEventListener("click", loginData);
});

function regresar() {
    window.location.href = "home";
}

