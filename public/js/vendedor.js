
function filtrarProductos(categoria) {
    let tabla = document.getElementById('tablaProductos');
    let filas = tabla.getElementsByTagName('tr');
    for (let i = 1; i < filas.length; i++) {
        let categoriaProducto = filas[i].getElementsByTagName('td')[1].textContent; // Obtener la categoría del producto (suponiendo que está en la segunda columna)
        if (categoria === '' || categoriaProducto.toLowerCase().includes(categoria.toLowerCase())) {
            filas[i].style.display = '';
        } else {
            filas[i].style.display = 'none';
        }
    }
}

function alertaAgregar() {
    //IDEA SOLO DEBE DE MOSTRARLA SI SE LLENAN TODOS LOS CAMPOS
    alert("Se ha agregado un nuevo producto.");
}

function eliminarProducto() {
    if (confirm("¿Estás seguro de que quieres eliminar este producto?")) {
        // IDEA lógica para eliminar el producto
        alert("El producto ha sido eliminado correctamente.");
    }
}