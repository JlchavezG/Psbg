
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
                                               <option value="<?php echo $row['Id_Genero'];?>"><?php echo $row['Nombre'];?></option>
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
