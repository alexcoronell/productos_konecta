<?php
require 'header.php';
?>

<div class="container mt-4">
    <h2 class="text-center">Edición de productos</h2>
    <div class="row">
        <div class="col">
            Formulario de Búsqueda
        </div>
        <div class="col">
            <form name="formulario" id="formulario" method="POST">
                <input type="hidden" name="id_producto" id="id_producto">
                <!-- Nombre del Producto -->
                <div class="mb-3">
                    <label for="nombre_producto" class="form-label">Nombre del Producto</label>
                    <input type="text" class="form-control" id="nombre_producto" name="nombre_producto">
                </div>
                <!-- Referencia -->
                <div class="mb-3">
                    <label for="referencia" class="form-label">Referencia</label>
                    <input type="number" class="form-control" id="referencia" name="referencia">
                </div>
                <!-- Precio -->
                <div class="mb-3">
                    <label for="referencia" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio">
                </div>
                <!-- Peso -->
                <div class="mb-3">
                    <label for="referencia" class="form-label">Peso</label>
                    <input type="number" class="form-control" id="peso" name="peso">
                </div>
                <!-- Categoría -->
                <div class="mb-3" id="categorias">
                <label for="id_categoria" class="form-label">Categoria:</label>
                <select name="id_categoria" id="id_categoria" class="form-control form-select" title="Seleccione..." required></select>
                </select>
                </div>
                <!-- Stock -->
                <div class="mb-3">
                    <label for="referencia" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-light" id="btnCancelar" onclick="limpiar()">Limpiar</button>
            </form>
        </div>
    </div>
</div>

<?php
require 'footer.php';
?>

<script src="scripts/gestion_producto.js"></script>