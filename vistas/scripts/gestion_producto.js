// Función que se ejecuta al inicio
function init() {

    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    })

    // Carga de opciones en el select Categorias
    $.post("../ajax/categoria.php?op=selectCategoria", function (r) {
        console.log(r);
        $('#id_categoria').html(r);
        setTimeout(() => {
            $('#id_categoria').selectpicker('refresh');
        }, 5000);
    })

    // cargaProductos();

    limpiar();
}

// Función para limpiar el formulario
function limpiar() {
    $("#id_producto").val("");
    $("#nombre_producto").val("");
    $('#referencia').val("");
    $('#precio').val("");
    $('#peso').val("");
    // $('#id_categoria').selectpicker('refresh');
    $('#stock').val("");
}


// Función para cancelar el formulario
function cancelarFormulario() {
    limpiar();
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
                cargaSedes();
                limpiar();
            }
        }
    })
}

// Función para mostrar los datos en la tabla de reportes y en formulario de edición
function mostrar(id) {
    $.post("../ajax/produco.php?op=mostrar", {
        id: id
    }, function (data, status) {
        data = JSON.parse(data);

        $("#id_producto").val(data.id);
        $('#nombre_producto').val(data.fo_compania);
        // $('#id_categoria').selectpicker('refresh');
        $('#referencia').val(data.nombre);
        $('#precio').val(data.telefono);
        $('#peso').val(data.direccion);
        $('#stock').val(data.notas);
        // $('.grupoBusqueda').hide();
        // $('.formularioEditActDesact').show();
    })
}


// Función para buscar en el formulario de edición de Productos
function buscar() {
    id_Buscar = $("#buscarId").val();
    mostrar(id_Buscar);
    $('#buscarId').val("");
}


function cargaProductos() { // Carga los productos registrados en el sistema
    $.post("../ajax/producto.php?op=selectProducto", function (r) {
        $('#buscarId').html(r);
        // $('#buscarId').selectpicker('refresh');
    })
}

function cancelar() {
    $('.grupoBusqueda').show();
    $('.formularioEditActDesact').hide();
    limpiar()
}

init();
