function filtrarProductos(categoria) {
    console.log("Categoría seleccionada:", categoria);
    let tabla = document.getElementById('tablaProductos');
    let filas = tabla.getElementsByTagName('tr');
    for (let i = 0; i < filas.length; i++) {
        let celdas = filas[i].getElementsByTagName('td');
        if (celdas.length > 1) { // Asegúrate de que haya al menos dos celdas en la fila
            let categoriaProducto = celdas[0].textContent.trim().toLowerCase(); // Suponiendo que la categoría está en la primera columna
            if (categoria === '' || categoriaProducto.includes(categoria.toLowerCase())) {
                filas[i].style.display = '';
            } else {
                filas[i].style.display = 'none';
            }
        }
    }
}

function editarProducto(id, nombre, precio, cantidad, imagen) {
    document.getElementById('nombreProducto').value = nombre;
    document.getElementById('precioProducto').value = precio;
    document.getElementById('cantidadProducto').value = cantidad;
    document.getElementById('imagenProducto').src = imagen;
    document.getElementById('urlImagen').value = imagen;
    // Establecer la acción del formulario con el ID del producto
    document.getElementById('editarProductoForm').action = "actualizarProducto/" + id;
}
