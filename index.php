<?php include('templates/header.html');   ?>

<body>
  <h1>Muebles </h1>

  <form action="consultas/consulta_importar_usuarios.php" method="post">
    <input type="submit" value="Importar Usarios">
  </form>
<br>
<h2>Login</h2>
  <form action="consultas/consulta_login" method="post">
    <label for="username">Usuario:</label>
    <input type="text" id="username" name="username" required><br><br>
    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required><br><br>
    <input type="submit" value="Login">
  </form>
</body>
</html>