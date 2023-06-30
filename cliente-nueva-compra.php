<?php include('templates/header.html');
require("config/conexion.php");
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$id = $_SESSION['user_id'];

$query = "SELECT nombre, calle, numero_domicilio, comuna, region FROM clientes WHERE id = :id";
$result = $db2->prepare($query);
$result->bindParam(':id', $id);
$result->execute();

$cliente = $result->fetch(PDO::FETCH_ASSOC);

if (!$cliente) {
    header('Location: index.php');
    exit();
}
?> 

<body>
<h1><?php echo $cliente['nombre']; ?></h1>
<p><?php echo $cliente['calle'] . ' ' . $cliente['numero_domicilio'] . ', ' . $cliente['comuna'] . ', ' . $cliente['region']; ?></p>

<h2>Nueva Compra</h2>
<form id="searchForm">
    <label for="producto_nombre">Nombre del Producto:</label>
    <input type="text" id="producto_nombre" name="producto_nombre" required>
    <input type="submit" value="Buscar">
</form>

<div id="productosContainer"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#searchForm').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            console.log("good");
            var nombre = $('#producto_nombre').val();

            $.ajax({
                url: 'consultas/consulta_listar_productos.php',
                method: 'POST',
                data: { producto_nombre: nombre },
                dataType: 'html',
                success: function(response) {
                    var productos = JSON.parse(response); // Parse the JSON response into an array of products

                    // Clear the previous content in #productosContainer
                    $('#productosContainer').empty();

                    // Iterate over each product and create the necessary elements
                    for (var i = 0; i < productos.length; i++) {
                        var producto = productos[i];
                        var productoId = producto.id;
                        var productoName = producto.nombre;
                        var productoPrice = producto.precio;

                        // Create a new product container div
                        var productoDiv = $('<div>').addClass('product');

                        // Create elements to display the product information
                        var productoIdElement = $('<p>').text('ID: ' + productoId);
                        var productoNameElement = $('<p>').text('Nombre: ' + productoName);
                        var productoPriceElement = $('<p>').text('Precio: ' + productoPrice);

                        // Create a button to add the product to the cart
                        var addButton = $('<button>').text('Add to Cart').attr('data-product-id', productoId).addClass('add-to-cart');

                        // Add event listener for the add to cart button
                        addButton.on('click', function() {
                            var productoId = $(this).attr('data-product-id');
                            // Perform the necessary action to add the product to the cart
                            // You can make an AJAX request or trigger a JavaScript function here
                            console.log('Product added to cart. ID: ' + productoId);
                        });

                        // Append the elements to the product container div
                        productDiv.append(productIdElement, productNameElement, productPriceElement, addButton);

                        // Append the product container div to #productosContainer
                        $('#productosContainer').append(productDiv);
                    }
                }
            });
        });
    });
</script>

</body>
</html>
