<?php include('../templates/header.html');   ?>

<body>
<?php
session_start();

require("../config/conexion.php");

$id = $_POST['id'];
$password = $_POST['password'];

$query = "SELECT * FROM usuarios WHERE id = :id AND password = :password";
$result = $db2->prepare($query);
$result->bindParam(':id', $id);
$result->bindParam(':password', $password);
$result->execute();

$user = $result->fetch(PDO::FETCH_ASSOC);

if ($user) {
  if ($user['tipo'] == 'admin') {
    $_SESSION['tipo'] = 'admin';
    $_SESSION['user_id'] = $user['id']; 
    header('Location: ../admin.php');
    exit();
  } elseif ($user['tipo'] == 'cliente') {
    $_SESSION['tipo'] = 'cliente';
    $_SESSION['user_id'] = $user['id'];
    echo"Logged in"; 
    header('Location: ../cliente-dashboard.php');
    exit();
  }
} else {
  header('Location: index.php');
  exit();
}
?>
  </body>