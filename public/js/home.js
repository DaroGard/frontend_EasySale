function addToCart(nombreproducto, precio, img, cantidadproducto, idvendedor) {
    // Obtener el carrito de localStorage o crear uno vacío si no existe
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Verificar si el producto ya está en el carrito
    let existingItem = cart.find(item => item.nombreproducto === nombreproducto && item.idvendedor === idvendedor);
    if (existingItem) {
        // Verificar si la cantidad en el carrito más la cantidad a agregar supera la cantidad máxima
        if (existingItem.cantidad < cantidadproducto) {
            existingItem.cantidad++;
        } else {
            // Mostrar un mensaje de error o realizar otras acciones si se alcanza la cantidad máxima
            alert('No se puede agregar más de la cantidad máxima disponible para este producto.');
            return; // Salir de la función sin agregar el producto
        }
    } else {
        cart.push({ nombreproducto, cantidadproducto, precio, img, cantidad: 1, idvendedor });
    }

    // Guardar el carrito actualizado en localStorage
    localStorage.setItem('cart', JSON.stringify(cart));

    console.log(cart);

    // Mostrar un mensaje de éxito o realizar otras acciones si lo deseas
    alert('Producto agregado al carrito');
}

var todosLosProductos = document.querySelectorAll('.container-box');

    function mostrarTodos() {
        // Eliminar todos los productos del DOM
        var contenedorProductos = document.getElementById('productosContainer');
        contenedorProductos.innerHTML = '';

        // Agregar todos los productos guardados
        todosLosProductos.forEach(function(producto) {
            contenedorProductos.appendChild(producto.cloneNode(true));
        });
    }

    function filtrarPorCategoria(categoriaId) {
        // Eliminar todos los productos del DOM
        var contenedorProductos = document.getElementById('productosContainer');
        contenedorProductos.innerHTML = '';

        // Agregar solo los productos de la categoría seleccionada
        todosLosProductos.forEach(function(producto) {
            if (producto.dataset.categoria === categoriaId) {
                contenedorProductos.appendChild(producto.cloneNode(true));
            }
        });
    }