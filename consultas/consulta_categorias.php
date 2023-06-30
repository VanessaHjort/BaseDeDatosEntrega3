<?php
require("../config/conexion.php");

try {
    $result = $db1 -> prepare("SELECT DISTINCT categoria FROM productos;");
    $result -> execute();
    $categorias = $result -> fetchAll();

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($categorias);
} catch (PDOException $e) {
    echo "error";
}
?>