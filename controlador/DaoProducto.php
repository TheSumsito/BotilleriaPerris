<?php

include_once 'conexion.php';
include_once '../modelos/producto.php';

class DaoProducto {

    private $cone;

    function __construct() {
        try {
            $this->cone = new conexion();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    //CRUD
    public function Crear($producto) {
        try {
            $sql = "insert into producto values(@id,'@desc','@mar',@pre,@stock)";
            $sql = str_replace("@id", $producto->getId(), $sql);
            $sql = str_replace("@desc", $producto->getDescripcion(), $sql);
            $sql = str_replace("@mar", $producto->getMarca(), $sql);
            $sql = str_replace("@pre", $producto->getPrecio(), $sql);
            $sql = str_replace("@stock", $producto->getStock(), $sql);
            $filas_afectadas = $this->cone->SqlOperacion($sql);
            return $filas_afectadas;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    public function Modificar($producto) {
        try {
            $sql = "update producto set descripcion='@desc', marca='@mar',"
                    . "precio=@pre,stock=@stock where idproducto=@id";
            $sql = str_replace("@id", $producto->getId(), $sql);
            $sql = str_replace("@desc", $producto->getDescripcion(), $sql);
            $sql = str_replace("@mar", $producto->getMarca(), $sql);
            $sql = str_replace("@pre", $producto->getPrecio(), $sql);
            $sql = str_replace("@stock", $producto->getStock(), $sql);
            $filas_afectadas = $this->cone->SqlOperacion($sql);
            return $filas_afectadas;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    public function Eliminar($id) {
        try {
            $sql = "delete from producto where idproducto=$id";
            $filas_afectadas = $this->cone->SqlOperacion($sql);
            return $filas_afectadas;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function ListarTodo() {
        try {
            $sql = "select * from producto";
            return $this->cone->SqlSeleccion($sql);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function Buscar($id) {
        try {
            $sql = "select * from producto where idproducto=$id";
            return $this->cone->SqlSeleccion($sql);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
