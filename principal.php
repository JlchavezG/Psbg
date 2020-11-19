<!-- incluir la base de datos conexcion -->
<?php include 'main/conecta.php';
// guardar sesion
session_start();
// validando usuario
$usuario = $_SESSION['Usuario'];
if (!isset($usuario)) {
   header("location:Aplicacion1.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- utilizar cdn -->
    <meta charset="utf-8">
    <title> Inicio de Sistema | 505 and 506</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/fontello.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/simple-sidebar.css">
    <!-- mandamos llamar jquery -->
    <script src="js/jquery-3.5.1.min.js"></script>
  </head>
  <body>
    <!-- incluyendo la pagina siderbar.php -->
    <?php include 'main/sidebar.php';?>
    <div id="page-content-wrapper">
    <!-- incluir a hora navbar -->
      <?php include 'main/navbar_principal.php';?>
      <h4 class="text-center display-4 py-2"> Dahsboard</h4>
         <div class="container">
             <?php include 'main/ejemplo.html'; ?>
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
