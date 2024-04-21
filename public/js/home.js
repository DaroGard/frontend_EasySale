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
      cart.push({ nombreproducto, cantidadproducto, precio, img, cantidad: 1, idvendedor});
  }

  // Guardar el carrito actualizado en localStorage
  localStorage.setItem('cart', JSON.stringify(cart));

  console.log(cart);

  // Mostrar un mensaje de éxito o realizar otras acciones si lo deseas
  alert('Producto agregado al carrito');
}

function filtrar(idCategoria) {
  var productos = document.querySelectorAll('#productos-container .col');
  console.log(idCategoria);
  productos.forEach(function(producto) {
      if (producto.getAttribute('data-categoria') == idCategoria || idCategoria == 'all') {
        console.log(producto.getAttribute('data-categoria'));
          producto.style.display = 'block';
      } else {
          producto.style.display = 'none';
      }
  });
}