<?php include('templates/header.html'); ?>

<body>
<h1>Muebles </h1>
<p>Aquí podrás armar una oferta o actualizar stock.</p>

<br>

<?php
    require("config/conexion.php");

        $result = $db1 -> prepare("SELECT DISTINCT region_nombre FROM region;");
        $result -> execute();
        $regions = $result -> fetchAll();

        $result = $db1 -> prepare("SELECT DISTINCT tienda_id FROM tiendas;");
        $result -> execute();
        $tiendas = $result -> fetchAll();

        $result = $db1 -> prepare("SELECT DISTINCT categoria FROM productos;");
        $result -> execute();
        $categorias = $result -> fetchAll();


        $result = $db1 -> prepare("SELECT DISTINCT nombre FROM productos;");
        $result -> execute();
        $productos = $result -> fetchAll();
?>


<form action="consultas/consulta_armar_oferta.php" method="post">
    Seleccinar una región:
    <select name="region" onchange="showTiendas1(this.value)">
      <option value="">Seleccionar región</option>
      <?php
      foreach ($regions as $region) {
        echo "<option value='$region[0]'>$region[0]</option>";
      }
      ?>
    </select>
<br><br>

<div id="tiendasDropdown1" style="display: none;">
    Seleccinar una tienda:
    <select name="tienda" onchange="showCategorias1(this.value)">
        <?php
        #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
        foreach ($tiendas as $tienda) {
        echo "<option value=$tienda[0]>$tienda[0]</option>";
        }
        ?>
    </select>
</div>
<br>

<div id="categoriasDropdown1" style="display: none;">
    Seleccinar una categoria:
    <select name="categoria" onchange="showProductos1(this.value)">
        <?php
        #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
        foreach ($categorias as $categoria) {
        echo "<option value=$categoria[0]>$categoria[0]</option>";
        }
        ?>
    </select>
</div>
<br>

<div id="productosDropdown1" style="display: none;">
    Seleccinar un producto:
    <select name="producto" onchange="showCantidad(this.value)">
        <?php
        #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
        foreach ($productos as $producto) {
        echo "<option value=$producto[0]>$producto[0]</option>";
        }
        ?>
    </select>
</div>
<br>

<div id="cantidadBlank" style="display: none;">
    <label for="canitdad">Cantidad de oferta:</label>
    <input type="text" id="cantidad" name="cantidad" required><br><br>
</div>
<input type="submit" value="Armar oferta">
</form>

<br><br>

<form action="consultas/consulta_actualizar_stock.php" method="post">
Seleccinar una región:
    <select name="region" onchange="showTiendas2(this.value)">
      <option value="">Seleccionar región</option>
      <?php
      foreach ($regions as $region) {
        echo "<option value='$region[0]'>$region[0]</option>";
      }
      ?>
    </select>
<br><br>

<div id="tiendasDropdown2" style="display: none;">
    Seleccinar una tienda:
    <select name="tienda" onchange="showCategorias2(this.value)">
        <?php
        #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
        foreach ($tiendas as $tienda) {
        echo "<option value=$tienda[0]>$tienda[0]</option>";
        }
        ?>
    </select>
</div>
<br>

<div id="categoriasDropdown2" style="display: none;">
    Seleccinar una categoria:
    <select name="categoria" onchange="showProductos2(this.value)">
        <?php
        #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
        foreach ($categorias as $categoria) {
        echo "<option value=$categoria[0]>$categoria[0]</option>";
        }
        ?>
    </select>
</div>
<br>

<div id="productosDropdown2" style="display: none;">
    Seleccinar un producto:
    <select name="producto" onchange="showStock(this.value)">
        <?php
        #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
        foreach ($productos as $producto) {
        echo "<option value=$producto[0]>$producto[0]</option>";
        }
        ?>
    </select>
</div>
<br>
<div id="stockBlank" style="display: none;">
    <label for="stock">Stock:</label>
    <input type="text" id="stock" name="stock" required><br><br>
    </div>
    <input type="submit" value="Actualizar Stock">
</form>

<script>
    function showTiendas1(region) {
      if (region !== "") {
        document.getElementById("tiendasDropdown1").style.display = "block";
      } else {
        document.getElementById("tiendasDropdown1").style.display = "none";
      }
    }

    function showCategorias1(tienda) {
      if (tienda !== "") {
        document.getElementById("categoriasDropdown1").style.display = "block";
      } else {
        document.getElementById("categoriasDropdown1").style.display = "none";
      }
    }

    function showProductos1(categoria) {
      if (categoria !== "") {
        document.getElementById("productosDropdown1").style.display = "block";
      } else {
        document.getElementById("productosDropdown1").style.display = "none";
      }
    }

    function showCantidad(producto) {
      if (producto !== "") {
        document.getElementById("cantidadBlank").style.display = "block";
      } else {
        document.getElementById("cantidadBlank").style.display = "none";
      }
    }

    function showTiendas2(region) {
      if (region !== "") {
        document.getElementById("tiendasDropdown2").style.display = "block";
      } else {
        document.getElementById("tiendasDropdown2").style.display = "none";
      }
    }

    function showCategorias2(tienda) {
      if (tienda !== "") {
        document.getElementById("categoriasDropdown2").style.display = "block";
      } else {
        document.getElementById("categoriasDropdown2").style.display = "none";
      }
    }

    function showProductos2(categoria) {
      if (categoria !== "") {
        document.getElementById("productosDropdown2").style.display = "block";
      } else {
        document.getElementById("productosDropdown2").style.display = "none";
      }
    }

    function showStock(producto) {
      if (producto !== "") {
        document.getElementById("stockBlank").style.display = "block";
      } else {
        document.getElementById("stockBlank").style.display = "none";
      }
    }
  </script>

</body>
</html>

