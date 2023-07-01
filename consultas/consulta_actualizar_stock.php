<?php
require("../config/conexion.php");

    $tienda = $_POST['tiendaDropdown2'];
    $categoria = $_POST['categoriaDropdown2'];
    $producto = $_POST['productoDropdown2'];
    $stock = $_POST['stock'];

    $query = "SELECT actualizarStock($tienda, $producto, $stock, $categoria);";
    $statement = $db1->prepare($query);
    //$statement->bindParam(':tienda', $tienda);
    //$statement->bindParam(':producto', $producto);
    //$statement->bindParam(':stock', $stock);
    //$statement->bindParam(':categoria', $categoria);
    $statement->execute();

?>
