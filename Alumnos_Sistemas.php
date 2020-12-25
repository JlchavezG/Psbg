<!-- incluir la base de datos -->
<?php include 'main/conecta.php';
      include 'main/configreg.php';
// guardar sesion
session_start();
// validando usuario
$usuario = $_SESSION['Usuario'];
if (!isset($usuario)) {
   header("location:index.php");
}
// consulta para extraer todos los campo de el usuario en la sesion
$Q= "SELECT * FROM Usuarios WHERE Usuario = '".$usuario."'";
$extraer = $conecta->query($Q);
$dupla = $extraer->fetch_array();
if ($dupla > 0) {
  $user = $dupla;
}
// validacion de expirar sesion por tiempo
if (isset($_SESSION['time'])) {
   // damos el timepo en segundo para determinar cuando expira la sesion
   $inactivo = 300; // 5 minutos
   // se calcula el tiempo inactivo ene l aplicativo
   $tiempo = time() - $_SESSION['time'];
   // verificamos si el tiempo pasa lo establecido para cerrar la sesion y redirigir
   if ($tiempo > $inactivo) {
     //Olvidamos la Sesion
     session_unset();
     //destruimos la session
     session_destroy();
     //redirigimos ala pagina principal de login
     header("location:index.php");
     exit();
   }
}
$_SESSION['time'] = time();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- utilizar cdn -->
    <meta charset="utf-8">
    <title> Menu Alumnos | IscjlchavezG</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/fontello.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/simple-sidebar.css">
    <!-- mandamos llamar jquery -->
    <script src="js/jquery-3.5.1.min.js"></script>
  </head>
  <body>
    <!-- incluyendo la pagina siderbar.php -->
    <?php
    // declara una variable
    $Tdash = $user['Id_Tusuario'];
    // validar o comparar el tipo de dato para determinar la accion
    if($Tdash == 1){include 'main/sidebarS.php';}
    else if($Tdash == 2){include 'main/sidebarA.php';}
    else if($Tdash == 3){include 'main/sidebarU.php';}
     ?>
    <div id="page-content-wrapper">
    <!-- incluir a hora navbar -->
    <?php include 'main/navbar_principal.php';?>
   <div class="container py-4">
      <h4 class="text-center py-3"> Menu Alumnos</h4>
         <div class="container">
             <?php include 'main/Malumnos_s.php'; ?>
         </div>
    </div>
  </div>
  <script src="js/bootstrap.min.js"></script>
  <script>
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
  </script>
  </body>
</html>
