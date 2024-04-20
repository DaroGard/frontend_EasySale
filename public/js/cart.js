
function mostrarDatosCarrito() {
    let cartItemsDiv = document.getElementById('cart-items');
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    cartItemsDiv.innerHTML = ''; // Limpiar contenido actual del carrito

    cart.forEach((item, index) => {
        let newRow = document.createElement('tr');
        newRow.innerHTML = `
            <th scope="row">${index + 1}</th>
            <td><img src="${item.img}" class="img-cart"></td>
            <td>${item.nombreproducto}</td>
            <td>$${item.precio}</td>
            <td>
                <button onclick="decrementar(${index})" class="btn btn-outline-danger">-</button>
                <span id="contador${index}" class="mx-2">${item.cantidad}</span>
                <button onclick="incrementar(${index})" class="btn btn-outline-success">+</button>
            </td>
        `;
        cartItemsDiv.appendChild(newRow);
    });
    console.log(cart)
}

function incrementar(index) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart[index].cantidad++;
    localStorage.setItem('cart', JSON.stringify(cart));
    mostrarDatosCarrito();
}

function decrementar(index) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    if (cart[index].cantidad > 0) {
        cart[index].cantidad--;
    }
    localStorage.setItem('cart', JSON.stringify(cart));
    mostrarDatosCarrito();
}

 // Llamar a la función al cargar la página para mostrar los datos del carrito
 mostrarDatosCarrito();


/*Función para obtener el contador de localStorage si existe
function obtenerContadorProducto(producto) {
    const contador = localStorage.getItem(`contador${producto}`);
    return contador ? parseInt(contador) : 0;
}

// Inicializar los contadores con los valores de localStorage
let contador1 = obtenerContadorProducto(1);
let contador2 = obtenerContadorProducto(2);
let contador3 = obtenerContadorProducto(3);

// Actualizar el contenido visual de los contadores
document.getElementById("contador1").innerHTML = contador1;
document.getElementById("contador2").innerHTML = contador2;
document.getElementById("contador3").innerHTML = contador3;

// Función para incrementar el contador y actualizar localStorage
function incrementar(producto) {
    if (producto === 1) {
        contador1++;
        localStorage.setItem('contador1', contador1);
        document.getElementById("contador1").innerHTML = contador1;
    } else if (producto === 2) {
        contador2++;
        localStorage.setItem('contador2', contador2);
        document.getElementById("contador2").innerHTML = contador2;
    } else if (producto === 3) {
        contador3++;
        localStorage.setItem('contador3', contador3);
        document.getElementById("contador3").innerHTML = contador3;
    }
}

// Función para decrementar el contador y actualizar localStorage
function decrementar(producto) {
    if (producto === 1 && contador1 > 0) {
        contador1--;
        localStorage.setItem('contador1', contador1);
        document.getElementById("contador1").innerHTML = contador1;
    } else if (producto === 2 && contador2 > 0) {
        contador2--;
        localStorage.setItem('contador2', contador2);
        document.getElementById("contador2").innerHTML = contador2;
    } else if (producto === 3 && contador3 > 0) {
        contador3--;
        localStorage.setItem('contador3', contador3);
        document.getElementById("contador3").innerHTML = contador3;
    }
}




document.addEventListener("DOMContentLoaded", function () {
    // Obtener el carrito del localStorage
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    // Función para mostrar los productos en el carrito
    function mostrarDatosCarrito() {
        let total = 0;
        const tbody = document.querySelector("tbody");

        // Limpiar el contenido previo del tbody
        tbody.innerHTML = "";

        // Iterar sobre cada producto en el carrito
        cart.forEach((producto, index) => {
            // Calcular el subtotal por producto
            const subtotal = producto.precio * producto.cantidad;
            total += subtotal;

            // Crear una nueva fila para el producto en la tabla
            const newRow = `
                <tr>
                    <th scope="row">${index + 1}</th>
                    <td><img src="${producto.imagen}" class="img-cart"></td>
                    <td>${producto.nombre}</td>
                    <td>$${producto.precio}</td>
                    <td>
                        <button onclick="decrementar(${index})" class="btn btn-outline-danger">-</button>
                        <span id="contador${index}" class="mx-2">${producto.cantidad}</span>
                        <button onclick="incrementar(${index})" class="btn btn-outline-success">+</button>
                    </td>
                </tr>
            `;

            // Agregar la fila al tbody
            tbody.innerHTML += newRow;
        });

        // Actualizar el total en el DOM
        document.getElementById("total").innerText = `$${total.toFixed(2)}`;
    }

    // Llamar a la función para mostrar los productos en el carrito al cargar la página
    mostrarDatosCarrito();

    // Función para incrementar la cantidad de un producto en el carrito
    window.incrementar = function (index) {
        cart[index].cantidad++;
        localStorage.setItem("cart", JSON.stringify(cart));
        mostrarDatosCarrito();
    };

    // Función para decrementar la cantidad de un producto en el carrito
    window.decrementar = function (index) {
        if (cart[index].cantidad > 0) {
            cart[index].cantidad--;
            localStorage.setItem("cart", JSON.stringify(cart));
            mostrarDatosCarrito();
        }
    };
});

*/

/*

// Array para almacenar los productos en el carrito
let carrito = [];

// Función para agregar un producto al carrito
function agregarAlCarrito(nombre, precio) {
    // Verificar si el producto ya está en el carrito
    const indice = carrito.findIndex(producto => producto.nombre === nombre);
    if (indice !== -1) {
        carrito[indice].cantidad++;
    } else {
        carrito.push({ nombre, precio, cantidad: 1 });
    }

    // Actualizar la visualización del carrito en la página HTML
    mostrarCarrito();
}

// Función para mostrar el carrito en la página HTML
function mostrarCarrito() {
    const carritoHTML = document.getElementById('carrito');
    carritoHTML.innerHTML = ''; // Limpiar el contenido existente

    carrito.forEach(producto => {
        const productoHTML = `
            <div class="producto">
                <img src="${producto.imagen}" alt="${producto.nombre}">
                <div>
                    <p>${producto.nombre}</p>
                    <p>Precio: $${producto.precio}</p>
                    <p>Cantidad: ${producto.cantidad}</p>
                </div>
            </div>
        `;
        carritoHTML.innerHTML += productoHTML;
    });
}

// Llamar a la función mostrarCarrito inicialmente para cargar el carrito al abrir la página
mostrarCarrito();
*/