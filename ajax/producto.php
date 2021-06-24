<?php

require_once "../modelos/Producto.php";

$producto = new Producto();

$id_producto = isset($_POST["id_producto"]) ? limpiarCadena($_POST["id_producto"]) : "";
$nombre_producto = isset($_POST["nombre_producto"]) ? limpiarCadena($_POST["nombre_producto"]) : "";
$referencia = isset($_POST["referencia"]) ? limpiarCadena($_POST["referencia"]) : "";
$precio = isset($_POST["precio"]) ? limpiarCadena($_POST["precio"]) : "";
$peso = isset($_POST["peso"]) ? limpiarCadena($_POST["peso"]) : "";
$id_categoria = isset($_POST["id_categoria"]) ? limpiarCadena($_POST["id_categoria"]) : "";
$stock = isset($_POST["stock"]) ? limpiarCadena($_POST["stock"]) : "";


switch ($_GET["op"]) {
    case 'guardaryeditar':
        if (empty($id_producto)) {
            $rspta = $producto->insertar($nombre_producto, $referencia, $precio, $peso, $id_categoria, $stock);
            echo $rspta ? "Producto registrado correctamente" : "Producto no se pudo registrar";
        } else {
            $rspta = $producto->editar($id_producto, $nombre_producto, $referencia, $precio, $peso, $id_categoria, $stock);
            echo $rspta ? "Producto actualizado correctamente" : "Producto no se pudo actualizar";
        }
        break;

    case 'mostrar':
        $rspta = $producto->mostrar($id_producto);
        // Codificación del resultado usando Json
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspta = $producto->listar();
        // Declaración de Array que contendrá todos los datos
        $data = array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => $reg->id_producto,
                "1" => $reg->nombre_producto,
                "2" => $reg->referencia,
                "3" => $reg->precio,
                "4" => $reg->peso,
                "5" => $reg->nombre_categoria,
                "6" => $reg->stock,
                "7" => $reg->fecha_creacion,
                "8" => $reg->fecha_modificacion
            );
        }
        $results = array(
            "sEcho" => 1, // Información para la tabla
            "iTotalRecords" => count($data), // Envío del total de registros a la tabla
            "iTotalDisplayRecords" => count($data), // Total de registros a visualizar
            "aaData" => $data
        );
        echo json_encode($results);

        break;

        case "selectProducto":
            $rspta = $producto -> select();
    
            while ($reg = $rspta -> fetch_object())
            {
                echo '<option value=' . $reg -> id_producto . '>' . $reg -> nombre_producto . '</option>';
            }
        break;

        case 'eliminar':
            $rspta = $producto->eliminarProducto($id_producto);
            echo $rspta ? "El producto se ha eliminado correctamente" : "El producto no se pudo eliminar";
        break;
}
