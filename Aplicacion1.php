
<?php
error_reporting(0);
session_start();
$mensaje = "";
include 'main/conecta.php';
  if (isset($_POST['ingreso'])) {
      $usuario = $_POST['usuario'];
      $password = md5($_POST['password']);
      // consulta para ingresar al sistema y determinar la variable de session
      $q = "SELECT * FROM Alumnos WHERE  Usuario = '$usuario' and Password = '$password'";
         if ($resultado = $conecta->query($q)) {
           while ($row = $resultado->fetch_array()) {
             $userok = $row['Usuario'];
             $passwordok = $row['Password'];
           }
             $resultado->close();
           }
      $conecta->close();
      // verificamos si exiten datos enviados
      if (isset($usuario) && isset($password)) {
      // comparamos los datos extraidos por la base de datos y los proporcionados por el usuario
         if ($usuario == $userok && $password == $passwordok) {
             $_SESSION['loguin']= TRUE;
             $_SESSION['Usuario'] = $usuario;
             // si son iguales podremos dar ingreso y crear la variablede sesion
             header("location:principal.php");}
                else {
                // de lo contrario mandaremos el mensaje de error con una alerta de bootstrap  
                   $mensaje = "<div class='alert alert-danger alert-dismissible fade show shadow-lg p-3 mb-5 bg-white rounded' role='alert'>
                                 <strong>Usuario No registrado en el sistema</strong> por favor verifica tus datos o cumunicate a soporte.
                                 <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                 </button>
                               </div>"; }
                  } else {
                    $mensaje = "<div class='alert alert-danger alert-dismissible fade show shadow-lg p-3 mb-5 bg-white rounded' role='alert'>
                                  <strong>Usuario No cuentas con permisos</strong> por favor verifica tus datos o cumunicate a soporte.
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                     <span aria-hidden='true'>&times;</span>
                                  </button>
                                </div>"; }
                  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/fontello.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <title>Inicio | Sesión</title>
  </head>
  <body>
     <div class="container py-4">
          <h3 class="text-center py-4"> Inicio de Sesion</h3>
       <div class="row justify-content-center h-100">
          <div class="card col-sm-8 col-md-6 col-lg-6 shadow-lg p-3 mb-5 bg-white rounded">
               <p class="text-center text-muted py-3"> Por Favor ingresa tu Usuario y Password</p><hr>
               <div class="container text-center">
                 <img src="img/logo-metal-iscjlchavezg.png" alt="logo-iscjlchavez" class="logo">
                 <div class="py-2">
                 <form class="form-group" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="py-2">
                        <input type="text" class="form-control" name="usuario" placeholder="Usuario" required>
                        <br>
                        <input type="password" class="form-control" name="password" id="pass" placeholder="Password" required>
                        <br>
                        <div class="col">
                             <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="ver" onclick="verpass(this);">
                                <label class="custom-control-label" for="ver">Ver Password</label>
                             </div>
                        </div>
                        <input type="submit" name="ingreso" value="Ingresar" class="btn btn-success btn-sm btn-block">
                 </form>
                    <hr>
                       <div class="row">
                             <div class="col">
                                  <p class="text-muted"><span class="icon-award-empty"></span> ¿Olvidaste tu Password?</p>
                             </div>
                             <div class="col">
                               <a href="#" class="text-muted text-decoration-none" data-toggle="modal" data-target="#RegistroModal"> <span class="icon-user-add"></span>Registrate </a>
                             </div>
                       </div>
                 </div>
               </div>
          </div>
        </div>
     </div>
     <div class="container py-2">
           <p class="text-center">IscjlchavezG@desarrollo 505 && 506 Programación Gestor de base de datos</p>
           <div class="py-2">
               <?php echo $mensaje; ?>
           </div>
     </div>
     <!-- integración de ventana modal de registro de usuario -->
     <div class="modal fade" id="RegistroModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                     <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"> Registro de Usuario</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                     </div>
                     <div class="modal-body">
                               ...
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                         <button type="button" class="btn btn-primary"> Registrarse</button>
                     </div>
                </div>
          </div>
     </div>
     <!-- termina la integración de la ventana modal -->
  <script type="text/javascript">
  function verpass(cb){
     if (cb.checked)
       $('#pass').attr("type","text");
       else
       $('#pass').attr("type","password");
  }
  </script>
  <script src="js/bootstrap.min.js"></script>
  </body>
</html>
