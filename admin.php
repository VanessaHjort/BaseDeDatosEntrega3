<?php include('templates/header.html'); ?>

<body>
<h1>Muebles </h1>
<p>Aquí podrás armar una oferta o actualizar stock.</p>

<br>
<form action="consultas/consulta_armar_oferta.php" method="post">
<select id="regionDropdown1">
  <option value="">Select Region</option>
</select>
<br>
<br>
<select id="tiendaDropdown1">
  <option value="">Select Tienda</option>
</select>
<br>
<br>
<select id="categoriaDropdown1">
  <option value="">Select Categoria</option>
</select>
<br>
<br>
<select id="productoDropdown1">
  <option value="">Select Producto</option>
</select>
<br><br>

<div id="cantidadBlank">
    <label for="canitdad">Cantidad de oferta:</label>
    <input type="text" id="cantidad" name="cantidad" required><br><br>
</div>
<input type="submit" value="Armar oferta">
</form>

<br><br>

<form action="consultas/consulta_actualizar_stock.php" method="post">
<select id="regionDropdown2">
  <option value="">Select Region</option>
</select>
<br>
<br>
<select id="tiendaDropdown2">
  <option value="">Select Tienda</option>
</select>
<br>
<br>
<select id="categoriaDropdown2">
  <option value="">Select Categoria</option>
</select>
<br>
<br>
<select id="productoDropdown2">
  <option value="">Select Producto</option>
</select>
<br><br>

<div id="stockBlank">
    <label for="stock">Cantidad de Stock:</label>
    <input type="text" id="stock" name="stock" required><br><br>
</div>
<input type="submit" value="Actualizar Stock">
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    var selectedTienda1 = '';
    var selectedTienda2 = '';
    $.ajax({
        url: 'consultas/consulta_regiones.php', 
        method: 'GET',
        dataType: 'json',
        success: function(response) {

        var dropdown1 = $('#regionDropdown1');
        dropdown1.empty();
        dropdown1.append($('<option>').text('Select Region').attr('value', ''));
        $.each(response, function(key, value) {
            dropdown1.append($('<option>').text(value.region_nombre).attr('value', value.regionId));
        });

        var dropdown2 = $('#regionDropdown2');
        dropdown2.empty();
        dropdown2.append($('<option>').text('Select Region').attr('value', ''));
        $.each(response, function(key, value) {
            dropdown2.append($('<option>').text(value.region_nombre).attr('value', value.regionId));
        });
        }
    });
    });

    $('#regionDropdown1').on('change', function() {
    var selectedRegion = $(this).val();
    // Fetch tiendas from the server based on the selected region
    $.ajax({
        url: 'consultas/consulta_tiendas.php', 
        method: 'POST', 
        data: { region: selectedRegion },
        dataType: 'json',
        success: function(response) {
        var dropdown = $('#tiendaDropdown1');
        dropdown.empty();
        dropdown.append($('<option>').text('Select Tienda').attr('value', ''));
        $.each(response, function(key, value) {
            dropdown.append($('<option>').text(value.tienda_id).attr('value', value.tienda_id));
        });
        }
    });
    });

    $('#tiendaDropdown1').on('change', function() {
    selectedTienda1 = $(this).val();
    $.ajax({
        url: 'consultas/consulta_categorias.php',
        method: 'POST', 
        data: { tienda: selectedTienda1 },
        dataType: 'json',
        success: function(response) {
        var dropdown = $('#categoriaDropdown1');
        dropdown.empty();
        dropdown.append($('<option>').text('Select Categoria').attr('value', ''));
        $.each(response, function(key, value) {
            dropdown.append($('<option>').text(value.categoria).attr('value', value.categoria));
        });
        }
    });
    });

    $('#categoriaDropdown1').on('change', function() {
    var selectedCategoria = $(this).val();
    $.ajax({
        url: 'consultas/consulta_productos.php', 
        method: 'POST', 
        data: { tienda: selectedTienda1, categoria: selectedCategoria },
        dataType: 'json',
        success: function(response) {
        var dropdown = $('#productoDropdown1');
        dropdown.empty();
        dropdown.append($('<option>').text('Select Producto').attr('value', ''));
        $.each(response, function(key, value) {
            dropdown.append($('<option>').text(value.nombre).attr('value', value.producto_id));
        });
        }
    });
    });

    $('#regionDropdown2').on('change', function() {
    var selectedRegion = $(this).val();
    // Fetch tiendas from the server based on the selected region
    $.ajax({
        url: 'consultas/consulta_tiendas.php', 
        method: 'POST', 
        data: { region: selectedRegion },
        dataType: 'json',
        success: function(response) {
        var dropdown = $('#tiendaDropdown2');
        dropdown.empty();
        dropdown.append($('<option>').text('Select Tienda').attr('value', ''));
        $.each(response, function(key, value) {
            dropdown.append($('<option>').text(value.tienda_id).attr('value', value.tienda_id));
        });
        }
    });
    });

    $('#tiendaDropdown2').on('change', function() {
    selectedTienda2 = $(this).val();
    $.ajax({
        url: 'consultas/consulta_categorias.php',
        method: 'POST', 
        data: { tienda: selectedTienda2 },
        dataType: 'json',
        success: function(response) {
        var dropdown = $('#categoriaDropdown2');
        dropdown.empty();
        dropdown.append($('<option>').text('Select Categoria').attr('value', ''));
        $.each(response, function(key, value) {
            dropdown.append($('<option>').text(value.categoria).attr('value', value.categoria));
        });
        }
    });
    });

    $('#categoriaDropdown2').on('change', function() {
    var selectedCategoria = $(this).val();
    $.ajax({
        url: 'consultas/consulta_productos.php', 
        method: 'POST', 
        data: { tienda: selectedTienda2, categoria: selectedCategoria },
        dataType: 'json',
        success: function(response) {
        var dropdown = $('#productoDropdown2');
        dropdown.empty();
        dropdown.append($('<option>').text('Select Producto').attr('value', ''));
        $.each(response, function(key, value) {
            dropdown.append($('<option>').text(value.nombre).attr('value', value.producto_id));
        });
        }
    });
    });

</script>
</body>
</html>

