// Función para cargar los productos del carrito a la factura
function cargarProductosFactura() {
    // Obtener el carrito de localStorage
    let carrito = JSON.parse(localStorage.getItem('cart'));

    // Obtener el cuerpo de la tabla de la factura
    let facturaItems = document.getElementById('factura-items');

    let totalGeneral = 0;

    // Limpiar el contenido actual de la tabla de la factura
    facturaItems.innerHTML = '';

    // Verificar si el carrito está vacío
    if (carrito && carrito.length > 0) {
        // Iterar sobre cada producto en el carrito
        carrito.forEach((producto, index) => {
        
            let subtotal = producto.cantidad * producto.precio;

            let descuento = subtotal * 0.05;

            let totalProducto = subtotal - descuento;

            // Agregar una fila a la tabla de la factura con los datos del producto
            facturaItems.innerHTML += `
                <tr>
                    <td>${producto.nombreproducto}</td>
                    <td>${producto.cantidad}</td>
                    <td>$${producto.precio.toFixed(2)}</td>
                    <td>$${subtotal.toFixed(2)}</td>
                    <td>$${descuento.toFixed(2)}</td>
                    <td>$${totalProducto.toFixed(2)}</td>
                </tr>
            `;

            totalGeneral += totalProducto;
        });
    }

    // Actualizar el total a pagar en la factura
    document.querySelector('.total p').textContent = `Total a pagar: $${totalGeneral.toFixed(2)}`;
}

// Llamar a la función al cargar la página para mostrar los productos del carrito en la factura
document.addEventListener('DOMContentLoaded', cargarProductosFactura);
