
function mostrarDatosCarrito() {
    let cartItemsDiv = document.getElementById('cart-items');
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    console.log(cart);
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
}

function incrementar(index) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    if(cart[index].cantidad<cart[index].cantidadproducto){
        cart[index].cantidad++;
        localStorage.setItem('cart', JSON.stringify(cart));
    }else{
        alert('No se puede agregar más de la cantidad máxima disponible para este producto.');
    }
    
    mostrarDatosCarrito();
}

function decrementar(index) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    if (cart[index].cantidad > 0) {
        cart[index].cantidad--;
        if (cart[index].cantidad === 0) {
            cart.splice(index, 1); // Eliminar el elemento del carrito si la cantidad llega a cero
        }
    }
    localStorage.setItem('cart', JSON.stringify(cart));
    mostrarDatosCarrito();
}

 // Llamar a la función al cargar la página para mostrar los datos del carrito
mostrarDatosCarrito();