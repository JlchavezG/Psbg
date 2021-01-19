<?php
include 'conecta.php';
// recuperamos el id por medio de una variable get
$id = $_GET['Id_Notificación'];
// modificamos el mensaje notificacion a leeida con valor 1
$actualiza = "UPDATE Notificaciones SET Opc = '1' WHERE Id_Notificacion = '$id'";
$actualizar = $conecta->query($actualiza);
header("location:../Notificaciones.php");
?>
