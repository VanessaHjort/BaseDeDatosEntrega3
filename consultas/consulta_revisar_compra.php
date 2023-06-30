<?php
require("../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $query = "SELECT producto.id FROM Compras_Producto WHERE id = :id";
    $statement = $db2->prepare($query);
    $statement->bindParam(':id', $id);
    $statement->execute();

    // $productoIDs = $statement->fetchAll(PDO::FETCH_COLUMN);

    // $productos = array();

    // foreach ($productoIDs as $productoID) {
    //     $query = "SELECT id, nombre, precio, numero_cajas FROM Productos WHERE id = :productoID";
    //     $statement = $db2->prepare($query);
    //     $statement->bindParam(':productoID', $productoID);
    //     $statement->execute();

    //     $producto = $statement->fetch(PDO::FETCH_ASSOC);

    //     $productos[] = $producto;
    // }

    // $query = "SELECT fecha FROM Fecha_De_Compras WHERE Compras_Producto.id = :id";
    // $statement = $db2->prepare($query);
    // $statement->bindParam(':id', $id);
    // $statement->execute();

    // $fecha = $statement->fetch(PDO::FETCH_COLUMN);

    // // Generate the HTML for displaying the purchase information
    // $html = '<p>Compra ID: ' . $id . '</p>';
    // foreach ($productos as $producto) {
    //     $html .= '<p>' . $producto['id'] . ' ' . $producto['nombre'] . ' ' . $producto['precio'] . ' ' . $producto['numero_cajas'] . '</p>';
    // }
    // $html .= '<p>Fecha: ' . $fecha . '</p>';

    // echo $html;
}
?>

