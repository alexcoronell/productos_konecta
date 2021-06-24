<?php

//Conexión a la base de datos
require "../config/conexion.php";

class Producto
{
    // Se implementa el constructor

    public function __construct()
    {
    }

    // Método para insertar registros
    public function insertar($nombre_producto, $referencia, $precio, $peso, $id_categoria, $stock)
    {
        $sql = "INSERT INTO producto (nombre_producto, referencia, precio, peso, id_categoria, stock)
        VALUES ('$nombre_producto', '$referencia', '$precio', '$peso', '$id_categoria', '$stock')";
        return ejecutarConsulta($sql);
    }
    

    // Método para editar registros
    public function editar($id_producto, $nombre_producto, $referencia, $precio, $peso, $id_categoria, $stock) 
    {
        $sql = "UPDATE producto SET
        nombre_producto = '$nombre_producto',
        referencia = '$referencia', 
        precio = '$precio', 
        peso = '$peso', 
        id_categoria = '$id_categoria', 
        stock = '$stock' 
        WHERE id_producto = '$id_producto'";
        return ejecutarConsulta($sql);
    }


    // Método para mostrar los datos de un registro a modificar
    public function mostrar($id_producto)
    {
        $sql = "SELECT * 
        FROM producto 
        WHERE id_producto = '$id_producto'";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function listar()
    {
        $sql = "SELECT p.id_producto, p.nombre_producto, p.referencia, p.precio, p.peso, cat.nombre_categoria, p.stock, p.fecha_creacion, p.fecha_modificacion 
        FROM producto p
        INNER JOIN categoria cat ON p.id_categoria = cat.id_categoria";
        return ejecutarConsulta($sql);
    }

    // Metodo para listar las Categorías
    public function select()
    {
        $sql = "SELECT * FROM producto";
        return ejecutarConsulta($sql);
    }


    //Método de buscar y mostrar producto
    public function buscarProducto($id_producto)
    {
        $sql = "SELECT * 
        FROM producto 
        WHERE id_producto = $id_producto";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function eliminarProducto($id_producto)
    {
        $sql = "DELETE FROM producto
        WHERE id_producto = $id_producto
        LIMIT 1";
        return ejecutarConsulta($sql);
    }

}
