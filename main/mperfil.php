<?php
error_reporting(0);
include 'conecta.php';
// consulta para extraer datos de perlil
$id = $_GET['Id_Usuarios'];
?>
<div class="container py-4">
  <div class="row py-3 text-center ">
     <p class="text-center text-muted"> El perfil de usuario a modificar pertenece a :</p>
  </div>
  <hr>
  <div class="row py-3">
       <div class="container">
          <form name="modificarp" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="col-sm-10 col-md-10 col-lg-10">
                <input type="text" value="" name="nombre" class="form-control" placeholder="Nombre">
            </div>
            <div class="col-sm-10 col-md-10 col-lg-10">
               <div class="row py-2">
                 <div class="col-sm-6 col-md-6 col-lg-6">
                    <input type="text" value="" name="ApellidoP" class="form-control" placeholder="Apellido Paterno">
                 </div>
                 <div class="col-sm-6 col-md-6 col-lg-6">
                     <input type="text" value="" name="ApellidoM" class="form-control" placeholder="Apellido Materno">
                 </div>
               </div>
               <div class="row py-2">
                 <div class="col-sm-6 col-md-6 col-lg-6">
                    <input type="tel" value="" name="Telefono" class="form-control" placeholder="Telefono">
                 </div>
                 <div class="col-sm-6 col-md-6 col-lg-6">
                     <input type="date" name="F_Nacimiento" value="" class="form-control" placeholder="Fecha de nacimiento">
                 </div>
               </div>
               <div class="row py-2">
                  <div class="col-sm-12 col-md-12 col-lg-12">
                     <input type="text" value="" name="Email" class="form-control" placeholder="Email">
                  </div>
               </div>
            </div>
          </form>
       </div>
  </div>
</div>
