<?php
require 'header.php';
?>

<div class="container mt-4">
    <h2 class="text-center">Agregar categorias</h2>
    <div class="row">
        <div class="col">
        <form name="formulario" id="formulario" method="POST">
            <input type="hidden" name="id_categoria" id="id_categoria">
            <div class="mb-3 form-group">
                <label for="nombre_categoria" class="form-label">Nombre de la categoría</label>
                <input type="text" name="nombre_categoria" class="form-control" id="nombre_categoria" maxlength="50" required>
            </div>
            <button type="submit" class="btn btn-primary" id="btnGuardar">Guardar</button>
            <button type="button" class="btn btn-light" id="btnCancelar" onclick="limpiar()">Cancelar</button>
            </form>
        </div>
    </div>
</div>
<?php
require 'footer.php';
?>

<script src="scripts/gestion_categoria.js"></script>