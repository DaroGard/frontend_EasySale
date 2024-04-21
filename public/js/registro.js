
function registrarUsuario() {
    // Obtener los valores del formulario
    let nombre = document.getElementById('nombre').value;
    let apellido = document.getElementById('apellido').value;
    let email = document.getElementById('correoelectronico').value;
    let password = document.getElementById('contrasena').value;
    let telefono = document.getElementById('telefono').value;
    let tarjeta = document.getElementById('numerotarjetacomprador').value;
    let vencimiento = document.getElementById('fechavencimientocomprador').value;
    let cvv = document.getElementById('codigoseguridadcomprador').value;

    // Guardar los datos en localStorage
    let userData = { nombre,apellido, email, password, telefono, tarjeta, vencimiento, cvv };
    localStorage.setItem('userData', JSON.stringify(userData));

    // Mostrar un mensaje de éxito
    alert('Usuario registrado correctamente');

    // Mostrar los datos en la consola
    console.log('Datos del usuario registrado:', JSON.parse(localStorage.getItem('userData')));
}