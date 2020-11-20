<?php
  include 'main/conecta.php';
  include 'main/configreg.php';
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
    <!-- script de jquery -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <title>Registro de Usuario | Iscjlchavezg</title>
  </head>
  <body>
    <!-- inicio de contenedor -->
    <div class="container py-4">
        <div class="row justify-content-center h-100 py-4">
          <div class="card col-sm-6 col-md-6 col-lg-6 shadow-lg p-3 mb-5 bg-white rounded">
               <article class="card-body">
                   <h4 class="card-title text-center"> Registro de Usuario</h4>
                   <hr>
                   <p class="text-success text-center">Digita los datos solicitados</p>
                      <!-- formulario de registro -->
                      <form name="Fregistro" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="registro">
                        <div class="row">
                          <div class="col">
                             <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                          </div>
                        </div>
                         <div class="row py-2">
                            <div class="col">
                               <input type="text" name="apellidop" class="form-control" placeholder="Apallido Materno" required>
                            </div>
                            <div class="col">
                               <input type="text" name="apellidom" class="form-control" placeholder="Apellido Paterno" required>
                            </div>
                          </div>
                          <div class="row py-2">
                            <div class="col">
                                 <input type="date" class="form-control" name="fecha" required>
                            </div>
                            <div class="col">
                              <select class="custom-select" name="genero" id="genero" required>
                                 <option selected>Selecciona el genero</option>
                                 <?php while($row = $resultado->fetch_assoc()) {  ?>
                                  <option value="<?php echo $row['Id_Genero']; ?>"><?php echo $row['NombreG']; ?></option>
                                 <?php } ?>
                              </select>
                            </div>
                           </div>
                           <div class="row py-2">
                             <div class="col">
                                <input type="tel" name="telefono" class="form-control" placeholder="Telefono" required>
                             </div>
                               <div class="col">
                                 <select class="custom-select" name="carrera" id="carrera" required>
                                    <option selected>Selecciona una carrera</option>
                                    <?php while($row1 = $resultado1->fetch_assoc()) {  ?>
                                     <option value="<?php echo $row1['Id_Carrera']; ?>"><?php echo $row1['NombreC']; ?></option>
                                    <?php } ?>
                                 </select>
                               </div>
                           </div>
                           <div class="row py-2">
                              <div class="col">
                                <select class="custom-select" name="semestre" id="semestre" required>
                                   <option selected>Selecciona un semestre </option>
                                   <?php while($row2 = $resultado2->fetch_assoc()) {  ?>
                                    <option value="<?php echo $row2['Id_Semestre']; ?>"><?php echo $row2['NombreS']; ?></option>
                                   <?php } ?>
                                </select>
                              </div>
                              <div class="col">
                                <select class="custom-select" name="grupo" id="grupo" required>
                                   <option selected>Selecciona un grupo </option>
                                   <?php while($row3 = $resultado3->fetch_assoc()) {  ?>
                                    <option value="<?php echo $row3['Id_Grupo']; ?>"><?php echo $row3['Nombre']; ?></option>
                                   <?php } ?>
                                </select>
                              </div>
                           </div>
                           <div class="row py-2">
                              <div class="col">
                                <select class="custom-select" name="plantel" id="plantel" required>
                                   <option selected>Selecciona un plantel </option>
                                   <?php while($row4 = $resultado4->fetch_assoc()) {  ?>
                                    <option value="<?php echo $row4['Id_Plantel']; ?>"><?php echo $row4['NombreP']; ?></option>
                                   <?php } ?>
                                </select>
                              </div>
                           </div>
                           <div class="row py-2">
                             <div class="col">
                                  <input type="text" name="user" class="form-control" name="user" placeholder="Usuario" required>
                             </div>
                           </div>
                           <div class="row py-2">
                             <div class="col">
                                  <input type="password" name="pass" class="form-control" placeholder="Password" required>
                             </div>
                           </div>
                           <div class="row py-2">
                             <div class="col">
                                  <input type="password" name="cpass" class="form-control"  placeholder="Conforma tu Password" required>
                             </div>
                           </div>
                           <div class="row py-2">
                             <div class="col">
                              <label for="imagen">Selecciona una imagen de perfil</label>
                              <input type="file" name="imagen" required>
                            </div>
                           </div>
                           <div class="row py-1">
                              <div class="col">
                                 <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="checkbox" id="checkbox" onclick="habilitar();">
                                    <label for="checkbox" class="custom-control-label">Acepto Terminos y Condiciones</label>
                                 </div>
                              </div>
                           </div>
                           <div class="row py-1">
                                 <input type="submit" name="submit" value="registrar" class="btn btn-sm btn-block btn-success" disabled>
                           </div>
                      </form>
                      <!-- termina registro -->
                   </article>
            </div>
        </div>
        <div class="row">
           <div class="col-sm-12 col-md12 col-lg-12 text-center">
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
  </body>
</html>
