<?php

$id=$_GET["identificador"];

include_once '../controlador/DaoProducto.php';
$dao=new DaoProducto();
$resp=$dao->Eliminar($id);

header("Location:listar.php");
