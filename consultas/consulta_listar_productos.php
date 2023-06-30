<?php
require("../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['producto_nombre'];

    $query = "SELECT id, nombre, precio FROM productos WHERE nombre = :nombre LIMIT 10";
    $statement = $db2->prepare($query);
    $statement->bindParam(':nombre', $nombre);
    $statement->execute();

    $prodcutos = $statement->fetchAll(PDO::FETCH_COLUMN);
}
?>