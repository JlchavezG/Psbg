<?php
// eliminar alertas de mysql solo mostrar errores
 error_reporting(0);
        // activar o iniciar una variable de sesion
        session_start();
        $email = $_POST['email'];
        $us = $_POST['Usuario'];
        // mandar o solicitar la conexion a bd
        include 'main/conecta.php';
        include 'main/configreg.php';
        // validar que se presiono el boton de ingreso
        if(isset($_POST['ingreso'])){
        // rescatar obtener los datos de la caja de texto usuario y password de el formulario
        $usuario = $conecta->real_escape_string($_POST['usuario']);
        // md5 es para convertir el dato a incriptado
        $password = $conecta->real_escape_string(md5($_POST['password']));
        // verificamos que exista la variable de sesion de el contador de intentos
        if (!isset($_SESSION['contador'])) {
           $_SESSION['contador'] == 0;
        }
        // consulta para ingresar al sistema y determinar la variable de session
        $q = "SELECT * FROM Usuarios WHERE Usuario = '$usuario' and Password = '$password' and Estado = 'Activo'";
        // comparo que los datos se encuentren y se guarden en las variables userok y passwordok
        if ($resultado = $conecta->query($q)) {
          while ($row = $resultado->fetch_array()) {
            $userok = $row['Usuario'];
            $passwordok = $row['Password'];
          }
          // cierro consulta
            $resultado->close();
          }
          // cierro conexcion a bd
          $conecta->close();
          // comparo datos extraidos con datos de el usuario si son correctos
            if (isset($usuario) && isset($password)) {
             if ($usuario == $userok && $password == $passwordok) {
                 $_SESSION['loguin']= TRUE;
                 $_SESSION['Usuario'] = $usuario;
                 header("location:principal.php");
               }
                 else {
                   // si no son correctos los datos
                   // asignamos un valor mas al contador de la sesion
                   $_SESSION['contador'] = $_SESSION['contador'] + 1;
                   // comprobar los 3 intentos
                   if ( $_SESSION['contador'] > 2) {
                     $on = "UPDATE Usuarios SET Estado = 'Inactivo' WHERE Usuario = $userok";
                     $line = $conecta->query($on);
                     $mensaje1.="<div class='alert alert-danger alert-dismissible fade show shadow-lg p-3 mb-5 bg-white rounded' role='alert'>
                                   <strong>Usuario Invalidado</strong> Por favor comunicate con el área de soporte.
                                   <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                   </button>
                                 </div>";
                   }
                   // si son menos de 3 intentos
                   else{
                   $mensaje.="<div class='alert alert-danger alert-dismissible fade show shadow-lg p-3 mb-5 bg-white rounded' role='alert'>
                                 <strong>Usuario no valido</strong> El usuario no se encuatra registrado en el sistema consulta a soporte.
                                 <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                 </button>
                               </div>";
                             }
               }
                 } else {
                   $mensaje.="<div class='alert alert-warning alert-dismissible fade show shadow-lg p-3 mb-5 bg-white rounded' role='alert'>
                                 <strong>Usuario no valido</strong> El usuario no se encuatra registrado en el sistema consulta a soporte.
                                 <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                 </button>
                               </div>";
     }
   }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/fontello.css">
    <link rel="stylesheet" href="css/pace.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <title>Inicio | Sesión IscjlchavezG</title>
  </head>
  <body>
     <div class="container py-4">
          <h3 class="text-center py-4"><span class="icon-users"></span> Inicio de Sesion</h3>
       <div class="row justify-content-center h-100 py-4">
          <div class="card col-sm-8 col-md-6 col-lg-6 shadow-lg p-3 mb-5 bg-light text-dark rounded">
               <p class="text-center text-dark py-3"><span class="icon-lock"><span> Inicio de Sesión</p><hr>
               <div class="container text-center">
                 <img src="img/logo-metal-iscjlchavezg.png" alt="logo-iscjlchavez" class="logo">
                 <div class="py-2">
                 <form class="form-group" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="py-2">
                   <div class="container">
                      <div class="row py-2">
                        <input type="text" class="caja" name="usuario" placeholder="Usuario" required>
                      </div>
                      <div class="row py-2">
                        <input type="password" class="caja" name="password" id="pass" placeholder="Password" required>
                     </div>
                     <div class="container">
                        <div class="row">
                             <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="ver" onclick="verpass(this);">
                                <label class="custom-control-label" for="ver"> Ver Password</label>
                             </div>
                        </div>
                      </div>
                      <div class="row py-2">
                        <input type="submit" name="ingreso" value="Ingresar" class="btn btn-success btn-sm btn-block">
                      </div>
                 </form>
                 </div>
                    <hr>
                       <div class="row">
                             <div class="col">
                                  <a href="recuperarpass.php" class="text-muted text-decoration-none"><p class="text-light"><span class="icon-award-empty"></span> Recuperar Password</p></a>
                             </div>
                             <div class="col">
                               <a href="NregistroUser.php" class="text-light text-decoration-none"><span class="icon-user-add"></span>Registrate </a>
                             </div>
                       </div>
                 </div>
               </div>
          </div>
        </div>
        <div class="py-1">
            <?php echo $mensaje; ?>
            <?php echo $mensaje1; ?>
        </div>
        <div class="row justify-content-center align-items-center">
           <img src="img/firma.png" alt="firma jose luis chavez g">
        </div>
     </div>
     <div class="container py-2">
           <p class="text-center"><a href="mailto:iscjlchavez@hotmail.com">IscjlchavezG@desarrollorWeb</a></p>
     </div>
  <script type="text/javascript">
  function verpass(cb){
     if (cb.checked)
       $('#pass').attr("type","text");
       else
       $('#pass').attr("type","password");
  }
  </script>
  <script src="js/pace.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>
</html>
