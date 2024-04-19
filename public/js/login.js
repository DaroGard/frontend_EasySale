function regresar(){
    window.location.href = "home"
}

   //validacion para el correo
   document.addEventListener('DOMContentLoaded', function () { // DOMContentLoaded Es un evento que se dispara cuando todo el contenido HTML del documento ha sido completamente cargado
    const emailInput = document.getElementById('email');

    emailInput.addEventListener('input', function () {
      const email = emailInput.value.trim(); //asegurar que no hay espacios en blanco en el correo 
      const emailExpresion = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; //Expresion regular

if (!emailExpresion.test(email)) {
        emailInput.setCustomValidity('Porfavor ingresa un correo valido'); //Mensaje de error con funcion estandar de javascript
    } else {
        emailInput.setCustomValidity('');
    }
    });
});

document.addEventListener('DOMContentLoaded', function() { // DOMContentLoaded Es un evento que se dispara cuando todo el contenido HTML del documento ha sido completamente cargado
    const emailInput = document.getElementById('email');

    emailInput.addEventListener('input', function() {
        const email = emailInput.value
    .trim(); //asegurar que no hay espacios en blanco en el correo 
        const emailExpresion = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; //Expresion regular

        if (!emailExpresion.test(email)) {
            emailInput.setCustomValidity(
            'Porfavor ingresa un correo valido'); //Mensaje de error con funcion estandar de javascript
        } else {
            emailInput.setCustomValidity('');
        }
    });
});