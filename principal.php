<?php include 'main/conecta.php';
session_start();
$usuario = $_SESSION['Usuario'];
if (!isset($usuario)) {
   header("location:Aplicacion1.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Inicio de Sistema | 505 and 506</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/fontello.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/simple-sidebar.css">
    <script src="js/jquery-3.5.1.min.js"></script>
  </head>
  <body>
    <?php include 'main/sidebar.php';?>
    <div id="page-content-wrapper">
      <?php include 'main/navbar_principal.php';?>
      <h4 class="text-center display-3"> Dashboard</h4>


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
