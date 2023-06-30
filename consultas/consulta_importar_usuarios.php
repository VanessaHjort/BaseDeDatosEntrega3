<?php
//session_start();

require("../config/conexion.php");

$query = "SELECT id FROM clientes";
$result = $db2->query($query);
$clientIDs = $result->fetchAll(PDO::FETCH_COLUMN);

function generateRandomPassword($length = 8) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
}

$insertQuery = "INSERT INTO usuarios (id, password, tipo) VALUES (:id, :password, :tipo)";
$insertStatement = $db2->prepare($insertQuery);

$adminID = "admin";
$adminPassword = "admin";
$adminType = "admin";
$clienteType = "cliente";

$response = array();

try {
    $checkQuery = "SELECT COUNT(*) FROM usuarios WHERE id = :id";
    $checkStatement = $db2->prepare($checkQuery);
    $checkStatement->bindParam(':id', $adminID);
    $checkStatement->execute();
    $adminExists = $checkStatement->fetchColumn();

    if (!$adminExists) {
        $insertStatement->bindParam(':id', $adminID);
        $insertStatement->bindParam(':password', $adminPassword);
        $insertStatement->bindParam(':tipo', $adminType);
        $insertStatement->execute();
    }
    
    foreach ($clientIDs as $clientID) {
        $checkQuery = "SELECT COUNT(*) FROM usuarios WHERE id = :id";
        $checkStatement = $db2->prepare($checkQuery);
        $checkStatement->bindParam(':id', $clientID);
        $checkStatement->execute();
        $userExists = $checkStatement->fetchColumn();
    
        if ($userExists) {
            continue;
        }
        $password = generateRandomPassword();
        $insertStatement->bindParam(':id', $clientID);
        $insertStatement->bindParam(':password', $password);
        $insertStatement->bindParam(':tipo', $clienteType);
        $insertStatement->execute();
    }

    $response['success'] = true;
    $response['message'] = 'Users added successfully!';
} catch (Exception $e) {
    $response['success'] = false;
    $response['message'] = 'An error occurred: ' . $e->getMessage();
}

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
