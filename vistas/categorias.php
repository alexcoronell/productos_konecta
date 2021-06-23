<?php
require 'header.php';
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12 mb-3">
        <h2 class="text-center">Agregar categorias</h2>
        <form name="formulario" id="formulario" method="POST">
            <input type="hidden" name="id_categoria" id="id_categoria">
            <div class="mb-3 form-group">
                <label for="nombre_categoria" class="form-label">Nombre de la categoría</label>
                <input type="text" name="nombre_categoria" class="form-control" id="nombre_categoria" maxlength="50" required>
            </div>
            <button type="submit" class="btn btn-primary" id="btnGuardar">Guardar</button>
            <button type="button" class="btn btn-light" id="btnCancelar" onclick="limpiar()">Limpiar</button>
            </form>
        </div>
        <hr>
        <div class="col-12">
        <h2 class="text-center">Listado de categorias</h2>
            <table class="mt-4 tabla-md table-striped table-bordered table-condensed table-hover" id="tbllistado">
                <thead class="mt-2">
                    <th>Id.</th>
                    <th>Nombre de Categoría</th>
                </thead>
            </table>
        </div>
    </div>
</div>
<?php
require 'footer.php';
?>

<script src="scripts/gestion_categoria.js"></script>
