<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <script src="../js/jquery.js"></script>
        <script src="../js/jquery.validate.js"></script>
        <script>
            $(document).ready(function (event) {
        //       $("#btnGrabar").click(function(){
        //       
        //           $.ajax({
        //               url:'procesoIngresar.php',
        //               type:'post',
        //               data: $("#formulario").serialize(),
        //               success: function(data){
        //                   alert(data);
        //               }
        //           });
        //       });
                $("#formulario").validate({
                    rules: {
                        txtId: "required",
                        txtDescripcion: "required",
                        cboMarca: "required",
                        txtPrecio: "required",
                        txtStock: "required"
                    },
                    messages: {
                        txtId: {
                            required: "Ingrese un identificador"
                        },
                        txtDescripcion: {
                            required: "Ingrese Descripcion del Articulo"
                        },
                        cboMarca: {
                            required: "seleccione una marca"
                        },
                        txtPrecio: {
                            required: "indique un precio"
                        },
                        txtStock: {
                            required: "indique un stock"
                        }
                    },
                    submitHandler: function (form) {
                        $.ajax({
                            url: 'procesoIngresar.php',
                            type: 'post',
                            data: $("#formulario").serialize(),
                            success: function (data) {
                                alert(data);
                            }
                        });
                    }
                });
            });
        </script>
        <?php include_once('menu.php') ?>
        <div>
            <p>Ingreso de un nuevo producto</p>
        </div>
        <div>
            <form action="procesoIngresar.php" method="post" id="formulario">
                <table>
                    <tr>
                        <td>Identificador</td>
                        <td>
                            <input type="number" name="txtId" id="txtId">
                        </td>

                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>
                            <input type="text" name="txtDescripcion" id="txtDescripcion">
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
                            <input type="number" min="100" max="85000" name="txtPrecio" id="txtPrecio">
                        </td>

                    </tr>
                    <tr>
                        <td>Stock</td>
                        <td>
                            <input type="number" min="1" max="200" name="txtStock" id="txtStock">
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <button type="submit" id="btnGrabar">Grabar</button>
                        </td>
                        <td></td>

                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>