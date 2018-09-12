<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <?php
        include_once 'menu.php';
        ?>
        <p>Listado de Productos</p>
        <table class="table">
            <tr>
                <td>Id</td>
                <td>Descripcion</td>
                <td>Marca</td>
                <td>Precio</td>
                <td>Stock</td>
                <td>Operacion</td>
            </tr>
            <?php
            include_once '../controlador/DaoProducto.php';
            $dao = new DaoProducto();
            $reg = $dao->ListarTodo();
            $archivo= fopen("lista.csv", "w");
            fwrite($archivo, "Id;Descripcion;Marca;Precio;Stock \n");
            while ($fila = mysqli_fetch_array($reg)) {
                ?>
                <tr>
                    <td> <?php echo $fila[0]; ?> </td>
                    <td> <?php echo $fila[1]; ?> </td>
                    <td> <?php echo $fila[2]; ?> </td>
                    <td> <?php echo $fila[3]; ?> </td>
                    <td> <?php echo $fila[4]; ?></td>
                    <td> 
                        <a href="eliminar.php?identificador=<?php echo $fila[0]; ?>"> Eliminar</a> 
                        <a href="modificar.php?identificador=<?php echo $fila[0]; ?>"> Modificar </a>
                    </td>
                    <?php 
                        fwrite($archivo, $fila[0].";".$fila[1].";".$fila[2].";".$fila[3].";".$fila[4]." \n" );
                    ?>
                </tr>
            <?php } 
                fclose($archivo);
            ?>
        </table>
        <a href="lista.csv">Archivo Excel</a> - <a href="listado_pdf.php">Impresion PDF</a>
    </body>
</html>
