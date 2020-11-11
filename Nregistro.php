<?php
error_reporting(0);
include 'main/conecta.php';
// consultas para extrar los datos de los select
// consulta tabla genero
$g = "SELECT * FROM Genero ORDER BY Id_Genero";
$respuesta = $conecta->query($g);
//consulta tabla carrera
$c = "SELECT * FROM Carrera ORDER BY Id_Carrera";
$respuestasc = $conecta->query($c);
//consulta tabla semestre
$s = "SELECT * FROM Semestre ORDER BY Id_Semestre";
$respuestass = $conecta->query($s);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <meta charset="utf-8">
    <title>Registro</title>
  </head>
  <body>
    <!-- integración de ventana modal de registro de usuario -->
    <div class="container py-4">
         <div class="card">
               <div class="card-content">
                    <div class="card-header">
                             <h5> Registro de Usuario</h5>
                    </div>
                    <div class="card-body">
                              <div class="container">
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="Formregistro" id="Formregistro">
                                   <div class="form-row">
                                     <div class="form-group col-md-12">
                                         <input type="text" name="nombre" class="form-control" placeholder="Nombre" id="apellidoP" required>
                                     </div>
                                   </div>
                                   <div class="form-row">
                                     <div class="form-group col-md-6">
                                         <input type="text" name="apellidop" class="form-control" placeholder="Apellido Peterno" id="apellidoP" required>
                                     </div>
                                     <div class="form-group col-md-6">
                                         <input type="text" name="apellidom" class="form-control" placeholder="Apellido Materno" id="apellidoM" required>
                                     </div>
                                   </div>
                                   <div class="form-row">
                                     <div class="form-group col-md-12">
                                         <label for="apellidoP">Fecha de Nacimiento</label>
                                         <input type="date" name="fecha" class="form-control"  id="apellidoP" required>
                                     </div>
                                   </div>
                                   <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <select class="custom-select my-1 mr-sm-2" name="genero" id="genero" required>
                                           <option value="">Selecciona un Genero</option>
                                                <?php while($row = $respuesta->fetch_assoc()) { ?>
                                                   <option value="<?php echo $row['Id_Genero'];?>"><?php echo $row['NombreG'];?></option>
                                                <?php } ?>
                                        </select>
                                      </div>
                                      <div class="form-group col-md-6">
                                        <input type="tel" name="telefono" class="form-control" name="telefono" placeholder="Telefono" required>
                                      </div>
                                   </div>
                                   <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <select class="custom-select my-1 mr-sm-2" name="carrera" id="carrera" required>
                                           <option value="">Selecciona una carrera</option>
                                           <?php while($row1 = $respuestasc->fetch_assoc()) { ?>
                                              <option value="<?php echo $row1['Id_Carrera'];?>"><?php echo $row1['NombreC'];?></option>
                                           <?php } ?>
                                        </select>
                                      </div>
                                      <div class="form-group col-md-6">
                                        <select class="custom-select my-1 mr-sm-2" name="semestre" id="semestre" required>
                                           <option value="">Selecciona el Semestre</option>
                                           <?php while($row2 = $respuestass->fetch_assoc()) { ?>
                                              <option value="<?php echo $row2['Id_Semestre'];?>"><?php echo $row2['NombreS'];?></option>
                                           <?php } ?>
                                        </select>
                                      </div>
                                   </div>
                                   <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <select class="custom-select my-1 mr-sm-2" name="grupo" id="grupo" required>
                                            <option value="">Selecciona el Grupo</option>
                                            <?php while($row3 = $respuestag->fetch_assoc()) { ?>
                                               <option value="<?php echo $row3['Id_Grupo'];?>"><?php echo $row3['Nombre'];?></option>
                                            <?php } ?>
                                        </select>
                                      </div>
                                      <div class="form-group col-md-6">
                                        <select class="custom-select my-1 mr-sm-2" name="plantel" id="plantel" required>
                                           <option value="">Selecciona un plantel</option>
                                               <?php while($row4 = $respuestap->fetch_assoc()) { ?>
                                                  <option value="<?php echo $row4['Id_Plantel'];?>"><?php echo $row4['Nombre'];?></option>
                                               <?php } ?>
                                        </select>
                                      </div>
                                   </div>
                                   <div class="form-row">
                                      <div class="form-group col-md-12">
                                         <input type="text" name="usuario" class="form-control" placeholder="Usuario" required>
                                      </div>
                                   </div>
                                   <div class="form-row">
                                      <div class="form-group col-md-12">
                                         <input type="password" name="pass" class="form-control" placeholder="Password" id="pass" required>
                                      </div>
                                      <div id="strengthMessage"></div>
                                   </div>
                                   <div class="form-row">
                                      <div class="form-group col-md-12">
                                         <input type="password" name="Cpass" class="form-control" placeholder="Confirma Password" id="Cpass" required>
                                      </div>
                                   </div>
                              </div>
                              <div class="custom-control custom-switch justify-content-right h-100">
                                 <input type="checkbox" class="custom-control-input" name="checkbox" id="checkbox" onclick="habilitar();">
                                 <label for="checkbox" class="custom-control-label">Acepto Terminos y Condiciones</label>
                              </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <input type="submit" name="registro" value="Registrar" class="btn btn-success" disabled>
                    </div>
                   </div>
                 </form>
         </div>
    </div>
    <!-- termina integración de ventana modal de registro -->
    <!-- script -->
      <script type="text/javascript">
      function habilitar(){
         document.Formregistro.registro.disabled = !document.Formregistro.checkbox.checked;
      }
      </script>
    <!-- script -->
  </body>
</html>
