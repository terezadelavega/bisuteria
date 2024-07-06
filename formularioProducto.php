<!-- formularioProducto.php -->
<form action="procesarProducto.php" method="POST">
    <label for="nombre">Nombre del Producto:</label>
    <input type="text" id="nombre" name="nombre" required><br>

    <label for="descripcion">Descripción:</label><br>
    <textarea id="descripcion" name="descripcion" rows="4" cols="50"></textarea><br>

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="precio" step="0.01" required><br>

    <label for="cantidad">Cantidad en Stock:</label>
    <input type="number" id="cantidad" name="cantidad" required><br>

    <input type="submit" value="Agregar Producto">
</form>
