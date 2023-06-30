<?php
require("../config/conexion.php");

try {
    $result = $db1->prepare("SELECT DISTINCT region_nombre FROM region;");
    $result->execute();
    $regions = $result->fetchAll(PDO::FETCH_ASSOC);

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($regions);
} catch (PDOException $e) {
    echo "error";
}
?>
