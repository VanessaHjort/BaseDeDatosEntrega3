<?php include('../templates/header.html');   ?>

<body>
<?php
require("../config/conexion.php");

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM usuarios WHERE name = :username AND password = :password";
$result = $db2->prepare($query);
$result->bindParam(':username', $username);
$result->bindParam(':password', $password);
$result->execute();

$user = $statement->fetch(PDO::FETCH_ASSOC);

if ($user) {
  if ($user['type'] == 'admin') {
    header('Location: admin.php');
    exit();
  } elseif ($user['type'] == 'client') {
    header('Location: client-dashboard.php');
    exit();
  }
} else {
  header('Location: index.php');
  exit();
}
?>
  </body>