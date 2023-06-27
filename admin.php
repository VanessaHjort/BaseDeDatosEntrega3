
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
Seleccinar un region:
<select name="region">
<?php
#Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
foreach ($regions as $region) {
echo "<option value=$region[0]>$region[0]</option>";
}
?>
</select>
<br><br>


Seleccinar una tienda:
<select name="tienda">
<?php
#Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
foreach ($tiendas as $tienda) {
echo "<option value=$tienda[0]>$tienda[0]</option>";
}
?>
</select>
<br><br>


Seleccinar una categoria:
<select name="categoria">
<?php
#Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
foreach ($categorias as $categoria) {
echo "<option value=$categoria[0]>$categoria[0]</option>";
}
?>
</select>
<br><br>


Seleccinar un producto:
<select name="producto">
<?php
#Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
foreach ($productos as $producto) {
echo "<option value=$producto[0]>$producto[0]</option>";
}
?>
</select>
<br><br>
<label for="canitdad">Cantidad de oferta:</label>
<input type="text" id="cantidad" name="cantidad" required><br><br>
<input type="submit" value="Armar oferta">
</form>

<br><br><br>

<form action="consultas/consulta_actualizar_stock.php" method="post">
Seleccinar un region:
<select name="region">
<?php
#Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
foreach ($regions as $region) {
echo "<option value=$region[0]>$region[0]</option>";
}
?>
</select>
<br><br>


Seleccinar una tienda:
<select name="tienda">
<?php
#Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
foreach ($tiendas as $tienda) {
echo "<option value=$tienda[0]>$tienda[0]</option>";
}
?>
</select>
<br><br>


Seleccinar una categoria:
<select name="categoria">
<?php
#Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
foreach ($categorias as $categoria) {
echo "<option value=$categoria[0]>$categoria[0]</option>";
}
?>
</select>
<br><br>


Seleccinar un producto:
<select name="producto">
<?php
#Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
foreach ($productos as $producto) {
echo "<option value=$producto[0]>$producto[0]</option>";
}
?>
</select>
<br><br>
<label for="stock">Stock:</label>
<input type="text" id="stock" name="stock" required><br><br>
<input type="submit" value="Actualizar Stock">
</form>
</body>
</html>

