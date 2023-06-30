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
<form action="consultas/consulta_listar_productos.php" method="POST">
    <label for="producto_nombre">Nombre del Producto:</label>
    <input type="text" id="producto_nombre" name="producto_nombre" required>
    <input type="submit" value="Buscar">
</form>
<?php if (isset($productos)): ?>
    <?php 
    foreach ($productos as $producto) {
        ?><p><?php
        echo $producto['id'];
        echo $producto['nombre'];
        echo $producto['precio'];
        ?><p><input type="submit" value="Agrerar a la compra"><?php
        }
    ?>  
    <input type="submit" value="Agrerar a la compra">
<?php endif; ?>

</body>
</html>