<?php
// consulta para extraer los datos de la tabla genero
$genero = "SELECT * FROM Genero ORDER BY Id_Genero";
$resultado = $conecta->query($genero);
// consulta para extraer los datos de la tabla carera
$carrera = "SELECT * FROM Carrera ORDER BY Id_Carrera";
$resultado1 = $conecta->query($carrera);
$contar1 = $resultado1->num_rows;
// consulta para extraer los datos de la tabla semestre
$semestre = "SELECT * FROM Semestre ORDER BY Id_Semestre";
$resultado2 = $conecta->query($semestre);
// consulta para extraer los datos de la tabla grupo
$grupo = "SELECT * FROM Grupo ORDER BY Nombre";
$resultado3 = $conecta->query($grupo);
$contar4 = $resultado3->num_rows;
// consulta para extraer los datos de la tabla plantel
$plantel = "SELECT * FROM Plantel ORDER BY NombreP";
$resultado4 = $conecta->query($plantel);
$contar3 = $resultado4->num_rows;
// consulta para saber cuantos alumnos existen en la plataforma
$alumnos = "SELECT * FROM Alumnos";
$al = $conecta->query($alumnos);
$contar = $al->num_rows;
// consulta para saber cuantos alumnos existen en la plataforma
$usuarios = "SELECT * FROM Usuarios";
$user = $conecta->query($usuarios);
$contar6 = $user->num_rows;
// consulta para saber cuantos modulos tenemos registrados en la base de datos
$modulo = "SELECT * FROM Modulos";
$mod = $conecta->query($modulo);
$contar2 = $mod->num_rows;
// consulta para extraer los parciales
$parcial = "SELECT * FROM Parcial";
$par = $conecta->query($parcial);
$contar5 = $par->num_rows;
// consulta para extraer los tipos de usuarios
$tuser = "SELECT * FROM Tusuario";
$t = $conecta->query($tuser);
$contar7 = $t->num_rows;

 ?>
