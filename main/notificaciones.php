<?php
$datos = "SELECT * FROM Usuarios";
$dato = $conecta->query($datos);
 ?>
<div class="container py-4">
  <div class="card">
      <div class="container">
         <div class="row">
           <div class="col-sm-12 col-md-12 col-lg-12 py-4">
              <p class="text-muted text-center">Genera una nueva notificación</p>
           </div>
         </div>
         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
         <div class="row">
           <div class="col-sm-6 col-md-6 col-lg-6 py-4">
             <select class="custom-select" name="user2">
                <option selected>Selecciona al Usuario a Notificar</option>
                <?php while($row = $dato->fetch_assoc()) {  ?>
                 <option value="<?php echo $row['Id_Usuarios']; ?>"><?php echo $row['Nombre']; ?></option>
                <?php } ?>
             </select>
           </div>
           <div class="col-sm-6 col-md-6 col-lg-6 py-4">
             <select class="custom-select" name="Importancia">
                <option selected>Selecciona Nuvel de Importancia</option>
                <option value="1">Alta</option>
                <option value="2">Media</option>
                <option value="3">Baja</option>
             </select>
           </div>
         </div>
         <div class="row py-3">
           <div class="col-sm-12 col-md-12 col-lg-12 py-2 text-center">
              <textarea name="Mansaje" rows="8" cols="80" class="form-control caja" placeholder="Mensaje de Notificación:"></textarea>
           </div>
         </div>
         <div class="row py-3">
           <div class="col-sm-12 col-md-12 col-lg-12 py-4">
             <input type="submit" name="notificar" value="Notificar" class="btn btn-success btn-sm btn-block">
           </div>
         </div>
      </div>
      </form>
  </div>
</div>
