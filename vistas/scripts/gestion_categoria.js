// Función que se ejecuta al inicio
function init() {

    listar();

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
    listar();
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

// Función para listar los registros en la tabla
function listar() {
    let tabla = $('#tbllistado').dataTable({
        language: {
            url: '../public/DataTables/Spanish.json',
            buttons: {
                copyTitle: 'Copiado al portapapeles',
                copyKeys: 'Use your keyboard or menu to select the copy command',
                copySuccess: {
                    1: "Copiada una fila al portapapeles",
                    _: "Copiadas %d filas al portapapeles"
                }
            }
        },
        "aProcessing": true, // Activación del procesamiento del datatables
        "aServerSide": true, // Paginación y filtrado realizado por el servidor
        dom: 'Bfrtip', // Se definen los elementos de contcargo de la tabla
        buttons: [
            'colvis', 'copy', 'excel', {
                extend: 'pdf',
                orientation: 'portrait',
                pageSize: 'LETTER',
                download: 'open',
                title: 'Reporte de Categorias',
                exportOptions: {
                    columns: ':visible'
                },
                alignment: 'center'
            },
        ],
        "ajax": {
            url: '../ajax/categoria.php?op=listar',
            type: "get",
            dataType: "json",
            error: function (e) {
                console.log(e.responseText);
            }
        },
        "columnDefs": [
            {
                "class": 'columnaId',
                "width": '20px',
                "targets": 0
            }
        ],
        keys: true,
        select: true,
        colReorder: true,
        rowReorder: true,
        "bDestroy": true,
        "iDisplayLength": 8, // Paginación
        "order": [
            [0, "desc"]
        ] // Ordenación (Columna, Orden)
    }).DataTable();
}

init();
