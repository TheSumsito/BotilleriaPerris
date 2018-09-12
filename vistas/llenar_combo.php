<?php
$id=$_POST["id_region"];
$cone=  mysqli_connect("localhost", "root", "", "botilleria");
$reg=  mysqli_query($cone, "select * from ciudad where region_idregion=$id");
while ($row=  mysqli_fetch_array($reg)){
    echo '<option value="'.$row[0].'">'.$row[1].'<option>';
}