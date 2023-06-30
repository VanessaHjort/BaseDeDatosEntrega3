<?php include('templates/header.html');   ?>

<body>
  <h1>Muebles </h1>

  <form id="importForm">
    <input type="button" value="Importar Usuarios" onclick="importUsuarios()">
  </form>
<br>
<h2>Login</h2>
  <form action="consultas/consulta_login.php" method="post">
    <label for="id">Usuario:</label>
    <input type="text" id="id" name="id" required><br><br>
    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required><br><br>
    <input type="submit" value="Login">
  </form>

  <script>
    function importUsuarios() {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
          console.log(this.responseText);
        }
      };
      xmlhttp.open("POST", "consultas/consulta_importar_usuarios.php", true);
      xmlhttp.send();
    }
  </script>
</body>
</html>