<?php
require 'header.php';
?>

<div class="container mt-4">
    <h2 class="text-center">Eliminar productos</h2>
    <div class="row">

        <div class="form-group row grupoBusqueda mt-3 col-12 w-50" id="grupoBusqueda">
            <label for="buscarId" class="form-label">Buscar Producto</span>:</label>
            <select name="id_productoSearch" id="id_productoSearch" class="form-control form-select" title="Seleccione..." data-live-search="true" required></select>
            <button type="button" class="btnBusqueda btn btn-primary mt-1" id="btnBusqueda" onclick="buscar()"><i class="fa fa-arrow-circle-o-up min992" aria-hidden="true" title="Cargar Información" alt="Cargar Información"></i>Cargar</button>
        </div>
        

        <div class="col-12" style="display: none;" id="formEdit">
            <form>
                <input type="hidden" name="id_producto" id="id_producto">
                <!-- Nombre del Producto -->
                <div class="mb-3">
                    <label for="nombre_producto" class="form-label">Nombre del Producto</label>
                    <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" disabled>
                </div>
                <!-- Stock -->
                <div class="mb-3">
                    <label for="referencia" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" disabled>
                </div>
                <button type="button" class="btn btn-danger" id="btnEliminar" onclick="eliminarProducto()">Eliminar</button>
                <button type="button" class="btn btn-light" id="btnCancelar" onclick="cancelar()">Cancelar</button>
            </form>
        </div>
    </div>
</div>

<?php
require 'footer.php';
?>

<script src="scripts/gestion_producto.js"></script>