// Función que se ejecuta al inicio
function init() {

    $.fn.selectpicker.Constructor.BootstrapVersion = '4.7.0';
    
    listar();

    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    })

    limpiar();
    cargarCategorias();
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
            }
            if(datos == "Categoria actualizada correctamente") {
                mostrarEditar();
                
            }
        }
    })
    limpiar();
    listar();
    cargarCategorias();
}

// Función para mostrar los datos en la tabla de reportes y en formulario de edición
function mostrar(id_categoria) {
    $.post("../ajax/categoria.php?op=mostrar", {
        id_categoria: id_categoria
    }, function (data, status) {
        data = JSON.parse(data);
        console.log(data);
        $("#id_categoria").val(data.id_categoria);
        $('#nombre_categoria').val(data.nombre_categoria);
        $('.grupoBusqueda').fadeOut();
        setTimeout(function() {
            $('#formulario').fadeIn();
        }, 300)

    })
}


// Función para buscar en el formulario de edición de Categorias
function buscarEditar() {
    id_categoriaSearch = $("#id_categoriaSearch").val();
    mostrar(id_categoriaSearch);
    $('#id_categoriaSearch').val("");
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

function cargarCategorias() {
    $.post("../ajax/categoria.php?op=selectCategoria", function (r) {
        $('#id_categoriaSearch').html(r);
        $('#id_categoriaSearch').selectpicker('refresh');
        $('#id_categoriaSearchEliminar').html(r);
        $('#id_categoriaSearchEliminar').selectpicker('refresh');
    })
}

function mostrarAgregar() {
    $('#grupoBusqueda').fadeOut()
    limpiar()
    setTimeout(function() {
        $('#btnGuardar').show();
        $('#btnEliminar').hide();
        $('#btnCancelar').hide();
        $('#btnLimpiar').show();
        $('#titulo').text('Agregar Categoría');
        $('#formulario').fadeIn()
        $('#nombre_categoria').prop('disabled', false);
    }, 300);
}
function mostrarEditar() {
    $('#formulario').fadeOut()
    
    setTimeout(function() {
        $('#btnGuardar').show();
        $('#btnEliminar').hide();
        $('#btnLimpiar').hide();
        $('#btnCancelar').show();
        $('#titulo').text('Editar Categoría');
        $('#grupoBusqueda').fadeIn()
        $('#nombre_categoria').prop('disabled', false);
    }, 300);
}
function mostrarEliminar() {
    $('#formulario').fadeOut()
    setTimeout(function() {
        $('#btnGuardar').hide();
        $('#btnEliminar').show();
        $('#btnLimpiar').hide();
        $('#btnCancelar').show();
        $('#titulo').text('Eliminar Categoría');
        $('#grupoBusqueda').fadeIn()
        $('#nombre_categoria').prop('disabled', true);
    }, 300);
}

function cancelar() {
    limpiar();
    cargarCategorias();
    if($('#titulo').text() == "Editar Categoría") {
        mostrarEditar();
    } else {
        mostrarEliminar();
    }
}

function eliminarProducto() {
    id_categoria = $('#id_categoria').val();
    bootbox.confirm("¿Estás seguro de eliminar la categoría?", function(result){
        if(result) {
            $.post("../ajax/categoria.php?op=eliminar", {
                id_categoria: id_categoria
            }, function (data, status) {
                bootbox.alert(data);
                if (data == "La categoría se ha eliminado correctamente") {
                    cargarCategorias();
                    mostrarEliminar();
                    listar();
                }
            })
        }
    })
}

init();
