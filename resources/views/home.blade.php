<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{url('css/home.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/54de7e7a33.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="{{url('img/Logo.png')}}" type="image/x-icon">
    <title>Easy Sale</title>
</head>
<body>
<!--Botones-->
  <div class="container">
    <div class="cart-icon">
      <a href="{{route('home-cart')}}"><i class="fa-solid fa-cart-shopping"></i></a>
    </div>
    <div id="homeButtons">
      <a href="{{route('login-vendedor')}}" class=" btn btn-success" >Soy Vendedor</a>
      <a href="{{ route('login-comprador') }}" class="btn btn-outline-primary">
        <i class="fas fa-user"></i>Iniciar Sesion</a>
      </div>
  </div>
<!--Categorias-->
  <ul class="nav justify-content-center">
    <li class="nav-item">
      <span class="boton-categoria" onclick="laptopsclick()">Electronicos</span>
    </li>
    <li class="nav-item">
      <span  class="boton-categoria" onclick="calzadoclick()">Computadoras</span>
    </li>
    <li class="nav-item">
      <span  class="boton-categoria" onclick="ropaclick()">Ropa Mujer</span>
    </li>
    <li class="nav-item">
      <span  class="boton-categoria" onclick="ropaclick()">Ropa Hombre</span>
    </li>
    <li class="nav-item">
      <span  class="boton-categoria" onclick="ropaclick()">Ropa Niño</span>
    </li>
    <li class="nav-item">
      <span  class="boton-categoria" onclick="ropaclick()">Ropa Niña</span>
    </li>
    <li class="nav-item">
      <span  class="boton-categoria" onclick="ropaclick()">Hogar</span>
    </li>
    <li class="nav-item">
      <span  class="boton-categoria" onclick="ropaclick()">Herramientas</span>
    </li>
  </ul>
<!--Items-->
  <div class="container text-center">
    <div class="row row-cols-3">
    @foreach ($productos as $producto)
    <div class="col">
      <div class="container-categories text-center">
        <div class="container-box categorie row row-cols-auto">
          <div class="card col">
            <img src="{{ asset($producto->imagen) }}" class="card-img-top" alt="Imagen">
            <div class="card-body">
              <h5 class="card-title">${{$producto->precio}}</h5>
              <hr>
              <p class="card-text">{{$producto->descripcion}}</p>
              <br>
              <a href="#" class="btn btn-primary">Add to cart</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  <!--
      <div class="col">
        <div class="container-categories text-center">
          <div class="container-box categorie row row-cols-auto">
            <div class="card col">
              <img src="https://th.bing.com/th/id/OIP.ed-29-ckMum--DpdlJRKHgHaFW?rs=1&pid=ImgDetMain" class="card-img-top" alt="Imagen">
              <div class="card-body">
                <h5 class="card-title">$200</h5>
                <hr>
                <p class="card-text">Windows Xp, 1GB RAM, 16 GB HDD,Celeron N300</p>
                <br>
                <a href="#" class="btn btn-primary">Add to cart</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    -->
    </div>
  </div>

  <script src="{{url('js/home.js')}}"></script>
  
</body>
</html>