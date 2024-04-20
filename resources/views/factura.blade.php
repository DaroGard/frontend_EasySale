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
            <tbody>
                <tr>
                    <td>Producto 1</td>
                    <td>2</td>
                    <td>$50.00</td>
                    <td>$100.00</td>
                    <td>$10</td>
                    <td>$90.00</td>
                </tr>
                <tr>
                    <td>Producto 2</td>
                    <td>1</td>
                    <td>$95.00</td>
                    <td>$95.00</td>
                    <td>$20</td>
                    <td>$75.00</td>
                </tr>
                <!-- Agregar más filas según los productos en el carrito -->
            </tbody>
        </table>
        <div class="total">
            <p>Total a pagar: $165.00</p>
        </div>
        <div class="print-button">
            <button onclick="window.print()">Imprimir factura</button>
        </div>
    </div>
    <div class="back-button">
        <a href="{{ route('comprador') }}" class="btn btn-succes">Regresar a la página principal</a>
    </div>
</body>
</html>