<?php
// recuperar los datos desde el formulario

$identificador=$_POST["txtId"];
$descripcion=$_POST["txtDescripcion"];
$marca=$_POST["cboMarca"];
$precio=$_POST["txtPrecio"];
$stock=$_POST["txtStock"];

include_once '../controlador/conexion.php';
include_once '../controlador/DaoProducto.php';
include_once '../modelos/producto.php';

$prod=new producto();
$prod->setId($identificador);
$prod->setDescripcion($descripcion);
$prod->setMarca($marca);
$prod->setPrecio($precio);
$prod->setStock($stock);

$dao=new DaoProducto();
$resp=$dao->Crear($prod);

if ($resp>0) {
    echo "Grabo";
}else{
    echo 'No Grabo';
}





?>