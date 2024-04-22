<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/factura.css') }}">
    <link rel="shortcut icon" href="{{ url('img/Logo.png') }}" type="image/x-icon">
    <title>Factura</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Factura</h1>
            <p>Número de factura: #123456</p>
        </div>
        <div class="invoice-details">
            <p>Fecha: 16 de abril de 2024</p>
            <p>Cliente: Nombre del cliente</p>
        </div>
        <table class="invoice-items">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio unitario</th>
                    <th>Subtotal</th>
                    <th>Descuento</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody id="factura-items">
            </tbody>
        </table>
        <div class="total">
            <p>Total a pagar: </p>
        </div>
        <div class="print-button">
            <button onclick="window.print()">Imprimir factura</button>
        </div>
    </div>
    <div class="back-button">
        <a href="{{ route('comprador') }}" class="btn btn-succes">Regresar a la página principal</a>
    </div>

    <script src="{{ url('js/factura.js') }}"></script>

</body>
</html>