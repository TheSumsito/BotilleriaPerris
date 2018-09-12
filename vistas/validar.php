<?php
session_start();
$user=$_POST["txtUser"];
$pass=$_POST["txtPass"];

$cone= mysqli_connect("localhost", "root", "", "botilleria");
$sql="select * from login where user='$user' and pass='$pass'";
$reg= mysqli_query($cone, $sql);
while ($row = mysqli_fetch_array($reg)) {
    $_SESSION["user"]=$user;
    header("location:index.php");
    return;
}
echo '<script>alert("no existe");'
. 'document.location.href="login.php"</script>';

