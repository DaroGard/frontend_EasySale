function guardarInfoPago() {
    // Capturar los valores del formulario
    let tarjeta = document.getElementById('tarjeta').value;
    let mes = document.getElementById('mes').value;
    let ano = document.getElementById('ano').value;
    let codigo = document.getElementById('codigo').value;

    let infoPago = { tarjeta, mes, ano, codigo};

    localStorage.setItem('infoPago', JSON.stringify(infoPago));

    // Mostrar un mensaje de éxito
    alert('Datos ingresados correcamente');

    // Mostrar los datos en la consola
    console.log('Datos del usuario registrado:', JSON.parse(localStorage.getItem('infoPago')));
}