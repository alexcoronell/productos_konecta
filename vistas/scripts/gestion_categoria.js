// Función que se ejecuta al inicio
function init() {

    cargarCategorias();

    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    })

    limpiar();
}

// Función para limpiar el formulario
function limpiar() {
    $("#id_categoria").val("");
    $("#nombre_categoria").val("");
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
    console.log(formData);
    $.ajax({
        url: "../ajax/categoria.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos) {
            bootbox.alert(datos);
            if (datos == "Categoría registrada correctamente" || datos == "Categoría actualizada correctamente") {
                limpiar();
                $('.grupoBusqueda').show();
                $('.formularioEditActDesact').hide();
                cargarCategorias();
            }
        }
    })
    limpiar();
}

// Función para mostrar los datos en la tabla de reportes y en formulario de edición
function mostrar(id) {
    $.post("../ajax/categoria.php?op=mostrar", {
        id: id
    }, function (data, status) {
        data = JSON.parse(data);

        $("#id_categoria").val(data.id_categoria);
        $('#nombre_categoria').val(data.nombre_categoria);
        // $('.grupoBusqueda').hide();
        // $('.formularioEditActDesact').show();
    })
}


// Función para buscar en el formulario de edición de Categorias
function buscar() {
    id_Buscar = $("#buscarId").val();
    mostrar(id_Buscar);
    $('#buscarId').val("");
}

function cargarCategorias() { // Carga las Categorias registrados en el sistema
    $.post("../ajax/categoria.php?op=selectCategoria", function (r) {
        $('#buscarId').html(r);
        $('#buscarId').selectpicker('refresh');
    })
}

init();
