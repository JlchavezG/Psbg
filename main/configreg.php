<?php
// consulta para extraer los datos de la tabla genero
$genero = "SELECT * FROM Genero ORDER BY Id_Genero";
$resultado = $conecta->query($genero);
// consulta para extraer los datos de la tabla carera
$carrera = "SELECT * FROM Carrera ORDER BY Id_Carrera";
$resultado1 = $conecta->query($carrera);
// consulta para extraer los datos de la tabla semestre
$semestre = "SELECT * FROM Semestre ORDER BY Id_Semestre";
$resultado2 = $conecta->query($semestre);
// consulta para extraer los datos de la tabla grupo
$grupo = "SELECT * FROM Grupo ORDER BY Id_Grupo";
$resultado3 = $conecta->query($grupo);
// consulta para extraer los datos de la tabla plantel
$plantel = "SELECT * FROM Plantel ORDER BY Id_Plantel";
$resultado4 = $conecta->query($plantel);



 ?>
