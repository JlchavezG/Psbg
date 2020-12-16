<?php
  error_reporting(0);
  include 'main/conecta.php';
  include 'main/configreg.php';
  // Inicia proceso de registro
  // validamos que se presione al boton registro
  if (isset($_POST['submit'])) {
  // variables de password para validarlos
  $pass = $conecta->real_escape_string($_POST['pass']);
  $cpass = $conecta->real_escape_string($_POST['cpass']);
  // verificamos si los password son diferentes
    if ($pass != $cpass) {
      $mensaje.="<div class='alert alert-danger alert-dismissible fade show shadow-lg p-3 mb-5 bg-white rounded' role='alert'>
                    <strong>Password no Coinciden</strong> Por favor verifica tus password que sean iguales.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>";
    }
  // de lo contrario recuperamos los datos de el usuario a travez de las cajas de texto por el metodo post
    else {
  // recuperamos los valores que nos da el usuario
  $nombre = $conecta->real_escape_string($_POST['nombre']);
  $apellidop = $conecta->real_escape_string($_POST['apellidop']);
  $apellidom = $conecta->real_escape_string($_POST['apellidom']);
  $f_nac = $conecta->real_escape_string($_POST['fecha']);
  $gen = $conecta->real_escape_string($_POST['genero']);
  $telefono = $conecta->real_escape_string($_POST['telefono']);
  $plantel = $conecta->real_escape_string($_POST['plantel']);
  $Tipo = "3";
  $email = $conecta->real_escape_string($_POST['email']);
  $usern = $conecta->real_escape_string($_POST['user']);
  $passw = md5($pass);
  $img = "user.png";
  $estado = "Activo";
  // consulta para verificar si exite un email igual dentro de la base de datos
  $nuevo = "SELECT * FROM Usuarios WHERE Email = '$email' or Usuario = '$usern'";
  $new = $conecta->query($nuevo);
  // validacion de el criterio de aceptacion
  if($new->num_rows > 0){
    $mensaje.="<div class='alert alert-danger alert-dismissible fade show shadow-lg p-3 mb-5 bg-white rounded' role='alert'>
                  <strong>El Usuario y/o Email ya Existe</strong> Por favor verifica tus datos ó <a href='index.php' class='text-muted text-decoration-none'>Click para iniciar sesion</a> .
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                     <span aria-hidden='true'>&times;</span>
                  </button>
                </div>";
  } else {
  // consulta para insertar registro en la base de datos
  $reg = "INSERT INTO Usuarios (Nombre, ApellidoP, ApellidoM, F_Nacimiento, Id_Genero, Telefono, Id_Plantel, Id_Tusuario,  Email, Usuario, Password, Img, Estado)VALUES('$nombre','$apellidop','$apellidom','$f_nac','$gen','$telefono',
  '$plantel','$Tipo','$email','$usern','$passw','$img','$estado')";
  $registro = $conecta->query($reg);
  // verificamos que el registro sea valido para mandar una alerta
   if ($registro > 0) {
     $mensaje.="<div class='alert alert-success alert-dismissible fade show shadow-lg p-3 mb-5 bg-white rounded' role='alert'>
                   <strong>Registro Exitoso</strong> Ya puedes iniciar sesión con tus credenciales <a href='index.php' class='text-muted text-decoration-none'>Click para iniciar sesion</a> .
                   <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                   </button>
                 </div>";
              }
          }
      }
  }
  $conecta->close();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- meta descripciones -->
    <meta charset="utf-8">
    <!-- estilos css -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/pace.css">
    <!-- script de jquery -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <title>Registro de Usuario | Iscjlchavezg</title>
  </head>
  <body>
    <!-- inicio de contenedor -->
    <div class="container py-4">
        <div class="row justify-content-center h-100 py-4">
          <div class="card col-sm-7 col-md-7 col-lg-7 shadow-lg p-3 mb-5 bg-white rounded">
               <article class="card-body">
                    <div class="row">
                        <div class="col">
                            <a href="index.php"><span class="icon-left-big"></span></a> Iniciar Sesión
                        </div>
                        <div class="col">
                              <h4 class="card-title text-center"><span class="icon-user-add"></span> Registro de Usuario</h4>
                        </div>
                    </div>
                   <hr>
                   <p class="text-success text-center">Digita los datos solicitados</p>
                      <!-- formulario de registro -->
                      <form name="Fregistro" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="registro" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col">
                             <input type="text" name="nombre" class="caja" placeholder="Nombre" required>
                          </div>
                        </div>
                         <div class="row py-2">
                            <div class="col">
                               <input type="text" name="apellidop" class="caja" placeholder="Apallido Materno" required>
                            </div>
                            <div class="col">
                               <input type="text" name="apellidom" class="caja" placeholder="Apellido Paterno" required>
                            </div>
                          </div>
                          <div class="row py-2">
                            <div class="col">
                                 <input type="date" class="caja" name="fecha" required>
                            </div>
                            <div class="col">
                              <select class="caja" name="genero" id="genero" required>
                                 <option selected>Selecciona el genero</option>
                                 <?php while($row = $resultado->fetch_assoc()) {  ?>
                                  <option value="<?php echo $row['Id_Genero']; ?>"><?php echo $row['NombreG']; ?></option>
                                 <?php } ?>
                              </select>
                            </div>
                           </div>
                           <div class="row py-2">
                             <div class="col">
                                <input type="tel" name="telefono" class="caja" placeholder="Telefono" required>
                             </div>

                           </div>
                           <div class="row py-2">
                              <div class="col">
                                <select class="caja" name="plantel" id="plantel" required>
                                   <option selected>Selecciona un plantel </option>
                                   <?php while($row4 = $resultado4->fetch_assoc()) {  ?>
                                    <option value="<?php echo $row4['Id_Plantel']; ?>"><?php echo $row4['NombreP']; ?></option>
                                   <?php } ?>
                                </select>
                              </div>
                           </div>
                           <div class="row py-2">
                              <div class="col">
                                  <input type="text" name="email" class="caja" placeholder="Email" required>
                              </div>
                           </div>
                           <div class="row py-2">
                             <div class="col">
                                  <input type="text" name="user" class="caja" name="user" placeholder="Usuario" required>
                             </div>
                           </div>
                           <div class="row py-2">
                             <div class="col">
                                  <input type="password" name="pass" class="caja" placeholder="Password" required>
                             </div>
                           </div>
                           <div class="row py-2">
                             <div class="col">
                                  <input type="password" name="cpass" class="caja"  placeholder="Conforma tu Password" required>
                             </div>
                           </div>
                           <div class="row py-1">
                              <div class="col">
                                 <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="checkbox" id="checkbox" onclick="habilitar();">
                                    <label for="checkbox" class="custom-control-label"><a href="#" class="text-muted text-decoration-none" data-toggle="modal" data-target="#staticBackdrop">Acepto Terminos y Condiciones</label></a>
                                 </div>
                              </div>
                           </div>
                           <div class="row py-2">
                                 <input type="submit" name="submit" value="registrar" class="btn btn-sm btn-block btn-success" disabled>
                           </div>
                           <div class="row">
                              <div class="col text-center">
                                  <hr>
                                  <img src="img/logo-metal-iscjlchavezg.png" alt="Logo iscjlchavezg" width="100px" height="100px">
                              </div>
                           </div>
                      </form>
                      <!-- termina registro -->
                   </article>
                   <?php echo $mensaje; ?>
            </div>
        </div>
        <!-- ventana modal de politicas de privacidad -->
        <?php include 'main/politicas.php'; ?>
        <div class="row">
           <div class="col-sm-12 col-md-12 col-lg-12 text-center">
              <img src="img/firma.png" alt="">
             <p class="text-center text-muted"> Desarrollo iscjlchavezg@2020 by Developer</p>
           </div>
        </div>
  </div>
  <!-- termina el contenedor -->
  <!-- script de bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- script para habilitar boton registro -->
  <script type="text/javascript">
    function habilitar(){
      document.Fregistro.submit.disabled = !document.Fregistro.checkbox.checked;
    }
  </script>
  <script src="js/pace.js"></script>
  </body>
</html>
