<?php
require("../config/conexion.php");

try {
    $selectedRegion = $_POST['region'];
    
    $result = $db1->prepare("SELECT DISTINCT tienda_id FROM tiendas, direcciones, region WHERE tiendas.direccion_id = direcciones.direccion_id AND direcciones.region_id = region.region_id AND region.region_nombre = :region_nombre;");
    $result->bindParam(':region_nombre', $selectedRegion);
    $result->execute();
    $tiendas = $result->fetchAll(PDO::FETCH_ASSOC);

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($tiendas);
} catch (PDOException $e) {
    echo "error";
}
?>
