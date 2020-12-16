<?php
include 'conecta.php';
$on = "SELECT * FROM Usuarios WHERE Online = 1";
$online = $conecta->query($on);
 ?>
<div class="container">
     <div class="row py text-center">
          <div class="col py-3">
              <h5 class="text-muted"> Usuarios Conectados</h5>
          </div>
    </div>
          <div class="container">
             <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="table-responsive table-hover" id="TablaOnline">
                  <table class="table text-center">
                      <thead>
                        <th>Status</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                      </thead>
                      <tbody>
                       <?php while($linea = $online->fetch_assoc()) { ?>
                         <td><span class="icon-circle text-success"></span></td>
                         <td><?php echo $linea['Nombre']; ?></td>
                         <td><?php echo $linea['ApellidoP']; ?></td>
                         <td><?php echo $linea['ApellidoM']; ?></td>
                      <?php } ?>
                      </tbody>
                  </table>
             </div>
          </div>
   </div>
</div>
