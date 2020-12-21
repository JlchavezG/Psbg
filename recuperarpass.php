<?php
error_reporting(0);
// incluimos la coneccion
include 'main/conecta.php';
// validar que se presione el boton restablecer
if (isset($_POST['recuperar'])) {
  // recuparar los datos de la caje de usuario
  $rusuario = $conecta->real_escape_string($_POST['usuario']);
  $remail = $conecta->real_escape_string($_POST['email']);
  // generamos la consulta para extraer datos de usuario
  $consulta = "SELECT * FROM Usuarios WHERE Email = '$remail' and Usuario = '$rusuario'";
  $ejecuta = $conecta->query($consulta);
  $encontro = $ejecuta->fetch_array();
  $id = $encontro['Id_Usuarios'];
  if ($encontro > 0) {
    $encontrado.="<div class='alert alert-success' role='alert'>
                  Se encontraron tus datos por favor Modifica tu password.</div>
                  <div class='container'>
                    <form  method='get'>
                       <div class='row py-2'>
                          <input type='password' class='caja' name='npass' placeholder='Nuevo password' requerid><br>
                       </div>
                       <div class='row py-3'>
                         <input type='submit' name='guardar' value='Guardar nuevo password' class='btn-success btn-sm btn-block'>
                       </div>
                     </fomr>
                  </div>";
  }
  else {
    $encontrado.="<div class='alert alert-danger' role='alert'>
                  No se encontraron tus datos en el sistema por favor contacta a soporte tecnico.</div>";
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
    <title>Recuperar Password | Sesión IscjlchavezG</title>
  </head>
  <body>
     <div class="container py-4">
       <div class="row justify-content-center h-100 py-4">
          <div class="card col-sm-9 col-md-9 col-lg-9 shadow-lg p-3 mb-5 bg-white rounded py-4">
               <p class="text-center text-muted py-3"><span class="icon-lock"><span> Recuperar Password</p><hr>
               <p class="text-center text-muted">Digita tu usuario y email para recuperar tu password</p>
               <div class="container text-center">
                 <form class="form-group" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="py-2">
                   <div class="container">
                      <div class="row py-2">
                        <input type="text" class="caja" name="usuario" placeholder="Usuario" required>
                      </div>
                      <div class="row py-2">
                        <input type="email" class="caja" name="email" id="email" placeholder="Email" required>
                     </div>
                     <div class="row py-2">
                        <input type="submit" name="recuperar" value="Recuperar password" class="btn btn-success btn-sm btn-block">
                      </div>
                 </form>
                 </div>
                 <?php echo $encontrado; ?>
               </div>
          </div>
        </div>
        <div class="row justify-content-center align-items-center">
           <img src="img/firma.png" alt="firma jose luis chavez g">
        </div>
     </div>
     <div class="container py-2">
           <p class="text-center">IscjlchavezG@desarrollorWeb</p>
     </div>
     <!-- ventana modal para modificar password -->
     <!-- Modal -->
     <div class="modal fade" id="recuperarModal" tabindex="-1" aria-labelledby="recuperarModalLabel" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content">
              <div class="modal-header">
                 <h5 class="modal-title" id="recuperarModalLabel">Nuevo Password</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                  </form>
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-primary btn-sm btn-block">Guardar Password</button>
    </div>
  </div>
</div>
</div>
     <!-- termina ventana modal -->
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
