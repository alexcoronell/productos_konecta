<?php
require 'header.php';
?>

<div class="container mt-4">
    <h2 class="text-center">Listado de los productos</h2>
    <div class="row">
        <div class="col mt-4">
            <table class="tabla-md table-striped table-bordered table-condensed table-hover" id="tbllistado">
                    <thead>
                                    <th>Id.</th>
                                    <th>Nombre de Producto</th>
                                    <th>Referencia</th>
                                    <th>Precio</th>
                                    <th>Peso</th>
                                    <th>Categoría</th>
                                    <th>Stock</th>
                                    <th>Fecha de creación</th>
                                    <th>Fecha de modificación</th>
                    </thead>

                </table>
        </div>
    </div>
</div>

<?php
require 'footer.php';
?>
<script src="scripts/reporte_productos.js"></script>