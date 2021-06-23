<?php

require_once "../modelos/Categoria.php";

$categoria = new Categoria();

$id_categoria = isset($_POST["iid_categoriad"]) ? limpiarCadena($_POST["id_categoria"]) : "";
$nombre_categoria = isset($_POST["nombre_categoria"]) ? limpiarCadena($_POST["nombre_categoria"]) : "";

switch ($_GET["op"])
{
    case 'guardaryeditar' :
        if (empty($id))
        {
            $rspta = $categoria -> insertar($nombre_categoria);
            echo $rspta ? "Categoria registrada correctamente" : "Categoria no se pudo registrar";
        } else
        {
            $rspta = $categoria -> editar($id_categoria, $nombre_categoria);
            echo $rspta ? "Categoria actualizada correctamente" : "Categoria no se pudo actualizar";
        }
    break;



    case 'mostrar':
        $rspta = $categoria -> mostrar($id);
        // Codificación del resultado usando Json
        echo json_encode($rspta);
    break;

    case 'listar':
        $rspta = $categoria -> listar();
        // Declaración de Array que contendrá todos los datos
        $data = Array();

        while ($reg = $rspta -> fetch_object())
        {
            $data[] = array(
                "0" => $reg -> id_categoria,
                "1" => $reg -> nombre_categoria
            );
        }
        $results = array (
            "sEcho" => 1, // Información para la tabla
            "iTotalRecords" => count($data), // Envío del total de registros a la tabla
            "iTotalDisplayRecords" => count($data), // Total de registros a visualizar
            "aaData" => $data);
        echo json_encode($results);

    break;

    case "selectCategoria":
        $rspta = $categoria -> select();

        while ($reg = $rspta -> fetch_object())
        {
            echo '<option value=' . $reg -> id_categoria . '>' . $reg -> nombre_categoria . '</option>';
        }
    break;

}

?>