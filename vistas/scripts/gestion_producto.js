// Función que se ejecuta al inicio
function init() {

    $.fn.selectpicker.Constructor.BootstrapVersion = '4.7.0';

    limpiar();
    cargarCategorias();

    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    })

    cargaProductos();

}

// Función para limpiar el formulario
function limpiar() {
    $("#id_producto").val("");
    $("#nombre_producto").val("");
    $('#referencia').val("");
    $('#precio').val("");
    $('#peso').val("");
    $('#id_categoria').val("");
    $('#id_categoria').selectpicker('refresh');
    $('#stock').val("");
    $('#id_productoSearch').val("");
    $('#id_productoSearch').selectpicker('refresh');
}


// Función para cancelar el formulario
function cancelar() {
    limpiar();
    cargaProductos();
}


// Función para guardar o editar
function guardaryeditar(e) {
    e.preventDefault(); // Evita que se ejecute la acción predeterminada del evento
    $("btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "../ajax/producto.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos) {
            bootbox.alert(datos);
            if (datos == "Producto registrado correctamente" || datos == "Producto actualizado correctamente") {
                limpiar();
                cargarCategorias();
                cargaProductos();
            }
        }
    })
}

// Función para mostrar los datos en la tabla de reportes y en formulario de edición
function mostrar(id_producto) {
    $.post("../ajax/producto.php?op=mostrar", {
        id_producto: id_producto
    }, function (data, status) {
        data = JSON.parse(data);
        $("#id_producto").val(data.id_producto);
        $('#nombre_producto').val(data.nombre_producto);
        $('#id_categoria').val(data.id_categoria);
        $('#id_categoria').selectpicker('refresh');
        $('#referencia').val(data.referencia);
        $('#precio').val(data.precio);
        $('#peso').val(data.peso);
        $('#stock').val(data.stock);
        $('#grupoBusqueda').fadeOut();
        $('#formEdit').fadeIn();
    })
}


// Función para buscar en el formulario de edición de Productos
function buscar() {
    id_productoSearch = $("#id_productoSearch").val();
    mostrar(id_productoSearch);
}


function cargaProductos() { // Carga los productos registrados en el sistema
    $.post("../ajax/producto.php?op=selectProducto", function (r) {
        $('#id_productoSearch').html(r);
        $('#id_productoSearch').selectpicker('refresh');
        $('#formEdit').fadeOut();
        $('#grupoBusqueda').fadeIn();
    })
}

function cargarCategorias() {
    $.post("../ajax/categoria.php?op=selectCategoria", function (r) {
        $('#id_categoria').html(r);
        $('#id_categoria').selectpicker('refresh');
    })
}

function eliminarProducto() {
    id_producto = $('#id_producto').val();
    bootbox.confirm("¿Estás seguro de eliminar el producto?", function(result){
        if(result) {
            $.post("../ajax/producto.php?op=eliminar", {
                id_producto: id_producto
            }, function (data, status) {
                bootbox.alert(data);
                if (data == "El producto se ha eliminado correctamente") {
                    cargaProductos();
                }
            })
        }
    })
}


init();
