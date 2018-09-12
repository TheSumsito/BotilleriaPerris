<?php
if (!isset($_GET["identificador"])){
    header("Location:listar.php");
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $id = $_GET["identificador"];
        include_once '../controlador/DaoProducto.php';
        $dao = new DaoProducto();
        $reg = $dao->Buscar($id);
        $fila= mysqli_fetch_row($reg);
        ?>
        <?php include_once('menu.php') ?>
        <div>
            <p>Modificar un producto</p>
        </div>
        <div>
            <form action="procesoModificar.php" method="post" id="formulario">
                <table>
                    <tr>
                        <td>Identificador</td>
                        <td>
                            <input type="number" name="txtId" id="txtId" value="<?php echo $fila[0]; ?>">
                        </td>

                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>
                            <input type="text" name="txtDescripcion" id="txtDescripcion"
                                   value="<?php echo $fila[1]; ?>">
                        </td>

                    </tr>
                    <tr>
                        <td>Marca</td>
                        <td>
                            <select name="cboMarca" id="cboMarca">
                                <option value="Fruna">Fruna</option>
                                <option value="CocaCola">Coca Cola</option>
                                <option value="3 Palos">3 Palos</option>
                                <option value="Cerveza">Cerveza</option>
                            </select>
                        </td>

                    </tr>
                    <tr>
                        <td>Precio</td>
                        <td>
                            <input type="number" min="100" max="85000" name="txtPrecio" id="txtPrecio"
                                   value="<?php echo $fila[3]; ?>">
                        </td>

                    </tr>
                    <tr>
                        <td>Stock</td>
                        <td>
                            <input type="number" min="1" max="200" name="txtStock" id="txtStock"
                                   value="<?php echo $fila[4]; ?>">
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <button type="submit" id="btnModificar">Modificar</button>
                        </td>
                        <td></td>

                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
