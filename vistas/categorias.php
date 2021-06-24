<?php
require 'header.php';
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12 col-md-6 mb-3 text-center">
            <button class="btn btn-primary" onclick="mostrarAgregar()">Agregar Categoría</button>
            <button class="btn btn-secondary" onclick="mostrarEditar()">Editar Categoría</button>
            <button class="btn btn-danger" onclick="mostrarEliminar()">Eliminar Categoría</button>


            <div class="mt-4 text-left">
                <h2 class="text-center" id="titulo"></h2>

                <div class="form-group row grupoBusqueda mt-3 col-12" id="grupoBusqueda" style="display: none;">
                    <label for="buscarId" class="form-label">Buscar Categoria</span>:</label>
                    <select name="id_categoriaSearch" id="id_categoriaSearch" class="form-control form-select" title="Seleccione..." data-live-search="true" required></select>
                    <button type="button" class="btnBusqueda btn btn-primary mt-1" id="btnBusqueda" onclick="buscarEditar()"><i class="fa fa-arrow-circle-o-up min992" aria-hidden="true" title="Cargar Información" alt="Cargar Información"></i>Cargar</button>
                </div>

                <form name="formulario" id="formulario" method="POST" style="display: none;">
                    <input type="hidden" name="id_categoria" id="id_categoria">
                    <div class="mb-3 form-group">
                        <label for="nombre_categoria" class="form-label">Nombre de la categoría</label>
                        <input type="text" name="nombre_categoria" class="form-control" id="nombre_categoria" maxlength="50" required>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btnGuardar">Guardar</button>
                    <button type="button" class="btn btn-danger" id="btnEliminar" onclick="eliminarProducto()">Eliminar</button>
                    <button type="button" class="btn btn-light" id="btnLimpiar" onclick="limpiar()">Limpiar</button>
                    <button type="button" class="btn btn-light" id="btnCancelar" onclick="cancelar()">Cancelar</button>
                </form>
            </div>

        </div>
        <hr>
        <div class="col-12 col-md-6">
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
