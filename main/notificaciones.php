<?php
error_reporting(0);
$datos = "SELECT * FROM Usuarios";
$dato = $conecta->query($datos);
// consulta de notificaciones para el usuario en cuestion
$u = $user['Id_Usuarios'];
$n = "SELECT * FROM Notificaciones WHERE Id_User2 = $u and Opc= '0' LIMIT 10";
$not = $conecta->query($n);
$numero = $not->num_rows;
// validacion de envio de informacion por medio de el boton notificar
if (isset($_POST['notificar'])) {
//recuperar datos
$user1 = $user['Id_Usuarios'];
$user2 = $conecta->real_escape_string($_POST['user2']);
$impor = $conecta->real_escape_string($_POST['Importancia']);
$mensaje = $conecta->real_escape_string($_POST['Mansaje']);
$fecha = date('Y/m/d');
$Opc = '0';
// consulta para insertar notificacion
$noti = "INSERT INTO Notificaciones(Id_User1, Id_User2, Importancia, Mensaje, FechaN, Opc)VALUES('$user1','$user2','$impor','$mensaje','$fecha','$Opc')";
$notificacion = $conecta->query($noti);
if ($notificacion > 0) {
  $alerta.= "<div class='alert alert-success alert-dismissible fade show shadow-lg p-3 mb-5 bg-white rounded' role='alert'>
                <strong>Notificación Exitosa</strong> Tu mensaje se ha enviado correctamente.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                   <span aria-hidden='true'>&times;</span>
                </button>
              </div>";
}
}
 ?>
<div class="container py-4">
     <div class="row py-3">
         <div class="col">
               <div class="card shadow-lg p-3 mb-5 rounded">
                    <?php if($numero > 0) { ?>
                      <div class="container py-2">
                        <table class="table table-sm table-hover">
                            <thead>
                              <tr>
                                <th scope="col">Importancia</th>
                                <th scope="col">Mensaje</th>
                                <th scope="col">Fecha</th>
                              </tr>
                            </thead>
                            <tbody>
                               <tr>
                            </tbody>
                          </table>
                      </div>
                    <?php } else { ?>
                      <div class="alert alert-danger" role="alert">Aun no tienes ninguna notificación</div>
                    <?php } ?>
               </div>
         </div>
         <div class="col">
           <div class="card shadow-lg p-3 mb-5 rounded">
               <div class="container">
                  <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 py-4">
                       <p class="text-muted text-center">Genera una nueva notificación</p>
                    </div>
                  </div>
                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                  <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 py-2">
                      <select class="custom-select" name="user2">
                         <option selected>Selecciona al Usuario a Notificar</option>
                         <?php while($row = $dato->fetch_assoc()) {  ?>
                          <option value="<?php echo $row['Id_Usuarios']; ?>"><?php echo $row['Nombre']; echo "&nbsp;".$row['ApellidoP']; echo "&nbsp;".$row['ApellidoM']; ?></option>
                         <?php } ?>
                      </select>
                    </div>
                    </div>
                    <div class="row py-2">
                    <div class="col-sm-12 col-md-12 col-lg-12 py-2">
                      <select class="custom-select" name="Importancia">
                         <option selected>Selecciona Nivel de Importancia</option>
                         <option value="Alta">Alta</option>
                         <option value="Media">Media</option>
                         <option value="Baja">Baja</option>
                      </select>
                    </div>
                  </div>
                  <div class="row py-3">
                    <div class="col-sm-12 col-md-12 col-lg-12 py-2 text-center">
                       <textarea name="Mansaje" rows="8" cols="80" class="form-control caja" placeholder="Mensaje de Notificación:"></textarea>
                    </div>
                  </div>
                  <div class="row py-3">
                    <div class="col-sm-12 col-md-12 col-lg-12 py-2">
                      <input type="submit" name="notificar" value="Notificar" class="btn btn-success btn-sm btn-block">
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 py-1">
                      <input type="submit" name="borrar" value="Borrar" class="btn btn-danger btn-sm btn-block">
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-12">
                          <?php echo $alerta; ?>
                      </div>
                  </div>
               </div>
               </form>
           </div>
         </div>
     </div>
</div>
