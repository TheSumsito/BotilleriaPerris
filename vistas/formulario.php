<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <script scr="../js/jsquery.js"></script>
        <script>
            $(document).ready(function(event){
                $("#cboRegion").change(function(){
                    var id=$("#cboRegion").val();
                    $.ajax({
                        url: "llenar_combo.php",
                        type: 'POST',
                        data: {id_region: id},
                        success: function(data){
                            $('#cboCiudad').html(data);
                        }
                    });
                });
            });
        </script>
        <?php
            $cone= mysqli_connect("localhost", "root", "", "botilleria");
            $reg= mysqli_query($cone, "select * from region");
        ?> 
        <form>
            <table border="1">
                <tr>
                    <td>Region:</td>
                    <td>
                        <select name="cboRegion" id="cboRegion">
                            <?php
                                while($row=  mysqli_fetch_array($Reg))
                                {
                                    echo '<option value=""'.$row[0].'">'.$row[1].'</option>';
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Ciudad:</td>
                    <td>
                        <select name="cboCiudad" id="cboCiudad">
                            
                        </select>
                    </td>
                </tr> 
            </table>
        </form>
    </body>
</html>
