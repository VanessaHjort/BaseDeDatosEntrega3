<?php
require("../config/conexion.php");

try {
    $selectedTienda = $_POST['tienda'];
    $selectedCategoria = $_POST['categoria'];
    $result = $db1->prepare("SELECT DISTINCT nombre FROM productos, stock WHERE productos.producto_id = stock.producto_id AND stock.tienda_id = :tienda_id AND productos.categoria = :categoria;");
    $result->bindParam(':tienda_id', $selectedTienda);
    $result->bindParam(':categoria', $selectedCategoria);
    $result->execute();
    $productos = $result->fetchAll();

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($productos);
} catch (PDOException $e) {
    echo "error";
}
?>