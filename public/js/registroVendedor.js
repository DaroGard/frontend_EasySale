function registrarVendedor() {
    // Obtener los valores del formulario
    let nombre = document.getElementById('nombre').value;
    let descripcion = document.getElementById('descripcion').value;
    let correo = document.getElementById('correo').value;
    let contrasena = document.getElementById('contrasena').value;
    let cuentavendedor = document.getElementById('cuentavendedor').value;

    // Guardar los datos en localStorage
    let userDataVendedor = { nombre, descripcion, correo, contrasena, cuentavendedor};
    localStorage.setItem('userDataVendedor', JSON.stringify(userDataVendedor));

    // Mostrar un mensaje de éxito
    alert('Usuario registrado correctamente');

    // Mostrar los datos en la consola
    console.log('Datos del usuario registrado:', JSON.parse(localStorage.getItem('userDataVendedor')));
}