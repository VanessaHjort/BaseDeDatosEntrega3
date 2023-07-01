<?php
require("../config/conexion.php");

    $tienda = $_POST['tiendaDropdown2'];
    $category = $_POST['categoriaDropdown2'];
    $producto = $_POST['productoDropdown2'];
    $stock = $_POST['stock'];

    $query = "SELECT actualizartock(:tienda, :producto, :stock, :categoria);";
    $statement = $db1->prepare($query);
    $statement->bindParam(':tienda', $tienda);
    $statement->bindParam(':producto', $producto);
    $statement->bindParam(':stock', $stock);
    $statement->bindParam(':categoria', $category);
    $statement->execute();

?>
