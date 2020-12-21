<?php
include 'conecta.php';
$id = $_GET['id'];
$pass = $_GET['npass'];
$newpass = md5($pass);
$mensaje = "";
// consulta para modificar los datos
$actualizar = "UPDATE Usuarios SET Password = '$newpass' WHERE Id_Usuarios = $id";
$ejecuta = $conecta->query($actualizar);
echo "se actualizo el password";

?>
