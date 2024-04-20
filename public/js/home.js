 // Función para agregar un producto al carrito
  function addToCart(nombreproducto, precio, img) {
    // Obtener el carrito de localStorage o crear uno vacío si no existe
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Verificar si el producto ya está en el carrito
    let existingItem = cart.find(item => item.nombreproducto === nombreproducto);
    if (existingItem) {
        existingItem.cantidad++;
    } else {
        cart.push({ nombreproducto, precio, img, cantidad: 1 });
    }

    // Guardar el carrito actualizado en localStorage
    localStorage.setItem('cart', JSON.stringify(cart));

    console.log(cart)

    // Mostrar un mensaje de éxito o realizar otras acciones si lo deseas
    alert('Producto agregado al carrito');
}


function laptopsclick() {
    document.getElementById('laptops').style.display='block';
    document.getElementById('calzado').style.display='none';
  }
  function calzadoclick(){
    document.getElementById('laptops').style.display='none';
    document.getElementById('calzado').style.display='block';
      
  }

  function ropaclick(){
    document.getElementById('ropa').style.display='block';
    document.getElementById('laptops').style.display='none';
    document.getElementById('calzado').style.display='none';
      
  }