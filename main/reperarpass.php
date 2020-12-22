<?php
include 'conecta.php';
$id = $_GET['id'];
$pass = $_GET['npass'];
$correo = $_GET['email'];
$newpass = md5($pass);
$mensaje = "";
// consulta para modificar los datos
$actualizar = "UPDATE Usuarios SET Password = '$newpass' WHERE Id_Usuarios = $id";
$ejecuta = $conecta->query($actualizar);
if ($ejecuta > 0) {
$para      = $correo;
$titulo    = 'Modificación de Password en plataforma IscjlchavezG';
$mensaje   = 'Tu nuevo password es :' .$pass;
$cabeceras = 'From: contacto@iscjoseluischavezg.mx' . "\r\n" .
    'Reply-To: webmaster@iscjoseluischavezg.mx' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
mail($para, $titulo, $mensaje, $cabeceras);
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Recuperación de password | IscjlchavezG </title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/fontello.css">
    <link rel="stylesheet" href="css/pace.css">
    <script src="js/jquery-3.5.1.min.js"></script>
  </head>
  <body><br>
    <div class="container py-4"><br>
         <div class="card col-sm-12 col-md-12 col-lg-12 shadow-lg p-3 mb-5 bg-white rounded py-4">
               <h4 class="text-center py-4">Se modifico el password de el email: <?php echo $correo; ?></h4>
              <div class="row py-4">
                   <div class="col"></div>
                   <div class="col">
                      <p class="text-muted">Tu nuevo password es:<span class="icon-shareable"></span>  <?php echo $pass; ?> </p>
                      <p class="text-muted">Se envio tu nuevo password al correo:<span class="icon-mail-alt"></span>  <?php echo $correo; ?></p>
                   </div>
              </div>
         </div>
         <div class="row py-3 text-center">
           <div class="col-sm-12 col-md-12 col-lg-12">
               <div class="alert alert-success" role="alert">
                 Ya puedes ingresar al sitema con tu nuevo Password solo da <a href="../index.php" class="text-muted text-decoration-none">click para iniciar sesión</a>
               </div>
          </div>
         </div>
    </div>
    <div class="row">
       <div class="col-sm-12 col-md12 col-lg-12 text-center">
          <img src="../img/firma.png" alt="">
         <p class="text-center text-muted"> Desarrollo iscjlchavezg@2020 by Developer</p>
       </div>
    </div>


    <script src="js/pace.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
