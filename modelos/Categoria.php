<?php

//Conexión a la base de datos
require "../config/conexion.php";

class Categoria 
{

    // Se implementa el constructor

    public function __construct()
    {
        
    }

    // Método para insertar registros
    public function insertar($nombre_categoria) 
    {
        $sql = "INSERT INTO categoria (nombre_categoria)
        VALUES ('$nombre_categoria')";
        return ejecutarConsulta($sql);
    }

    // Método para editar registros
    public function editar($id_categoria, $nombre_categoria)
    {
        $sql = "UPDATE categoria SET nombre_categoria = '$nombre_categoria'
        WHERE id_categoria = '$id_categoria'";
        return ejecutarConsulta($sql);
    }


    // Método para mostrar una categoria
    public function mostrar($id_categoria) 
    {
        $sql = "SELECT * FROM categoria
        WHERE id_categoria = '$id_categoria'";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function listar()
    {
        $sql = "SELECT * FROM categoria";
        return ejecutarConsulta($sql);
    }

     // Metodo para listar las Categorías
     public function select()
     {
         $sql = "SELECT * FROM categoria";
         return ejecutarConsulta($sql);
     }

     public function eliminarCategoria($id_categoria)
    {
        $sql = "DELETE FROM categoria
        WHERE id_categoria = $id_categoria
        LIMIT 1";
        return ejecutarConsulta($sql);
    }
}

?>