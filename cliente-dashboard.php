<?php
include('templates/header.html');
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

    <h2>Revisar Compras</h2>

    <form id="revisar-compra-form" method="POST">
        <label for="id">Compra Id:</label>
        <input type="text" id="id" name="id" required>
        <input type="submit" value="Revisar Compra">
    </form>

    <!-- Display the purchase information if available -->
    <div id="compra-info"></div>

    <br><br>
    <form action="cliente-nueva-compra.php">
        <input type="submit" value="Nueva Compra">
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#revisar-compra-form').submit(function(e) {
                e.preventDefault();

                var compraId = $('#compra_id').val();

                $.ajax({
                    type: 'POST',
                    url: 'consultas/consulta_revisar_compra.php',
                    data: { compra_id: compraId },
                    success: function(response) {
                        $('#compra-info').html(response);
                    },
                    error: function() {
                        alert('An error occurred while processing the request.');
                    }
                });
            });
        });
    </script>
</body>
</html>
