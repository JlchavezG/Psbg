<?php
error_reporting(0);
include 'conecta.php';
// consulta para extraer datos de perlil
$id = $_GET['Id_Usuarios'];
$busca = "SELECT * FROM Usuarios WHERE Id_Usuarios = '$id'";
$bmodifica = $conecta->query($busca);
$perfil = $bmodifica->fetch_array();
// validar que se presione al boton actualizar
if(isset($_POST['modificar'])){
// recuperar los datos
$ids = $_POST['id'];
$nom = $conecta->real_escape_string($_POST['nombre']);
$ap1 = $conecta->real_escape_string($_POST['ApellidoP']);
$ap2 = $conecta->real_escape_string($_POST['ApellidoM']);
$tel = $conecta->real_escape_string($_POST['Telefono']);
$f_n = $conecta->real_escape_string($_POST['F_Nacimiento']);
$em  = $conecta->real_escape_string($_POST['Email']);
$us  = $conecta->real_escape_string($_POST['user']);
// consulta para actualizar los datos de usaurio
$sql = "UPDATE Usuarios SET Nombre = '$nom', ApellidoP = '$ap1', ApellidoM = '$ap2', F_Nacimiento = '$f_n', Telefono= '$tel',
Email = '$em', Usuario = '$us' WHERE Id_Usuarios = '$ids'";
$resultado = $conecta->query($sql);

}
?>
<div class="container py-4">
  <div class="row py-3 text-center ">
     <p class="text-center text-muted"> El perfil de usuario a modificar pertenece a : </p>
  </div>
  <hr>
  <div class="row py-3">
       <div class="container">
          <form name="modificarp" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="col-sm-10 col-md-10 col-lg-10">
                <input type="hidden" value="<?php echo $perfil['Id_Usuarios']; ?>" name="id" class="form-control" placeholder="Id">
                <input type="text" value="<?php echo $perfil['Nombre']; ?>" name="nombre" class="form-control" placeholder="Nombre">
            </div>
            <div class="col-sm-10 col-md-10 col-lg-10">
               <div class="row py-2">
                 <div class="col-sm-6 col-md-6 col-lg-6">
                    <input type="text" value="<?php echo $perfil['ApellidoP']; ?>" name="ApellidoP" class="form-control" placeholder="Apellido Paterno">
                 </div>
                 <div class="col-sm-6 col-md-6 col-lg-6">
                     <input type="text" value="<?php echo $perfil['ApellidoM']; ?>" name="ApellidoM" class="form-control" placeholder="Apellido Materno">
                 </div>
               </div>
               <div class="row py-2">
                 <div class="col-sm-6 col-md-6 col-lg-6">
                    <input type="tel" value="<?php echo $perfil['Telefono']; ?>" name="Telefono" class="form-control" placeholder="Telefono">
                 </div>
                 <div class="col-sm-6 col-md-6 col-lg-6">
                     <input type="date" name="F_Nacimiento" value="<?php echo $perfil['F_Nacimiento']; ?>" class="form-control" placeholder="Fecha de nacimiento">
                 </div>
               </div>
               <div class="row py-2">
                  <div class="col-sm-6 col-md-6 col-lg-6">
                     <input type="text" value="<?php echo $perfil['Email']; ?>" name="Email" class="form-control" placeholder="Email">
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-6">
                     <input type="text" value="<?php echo $perfil['Usuario']; ?>" name="user" class="form-control" placeholder="Usuario">
                  </div>
               </div>
               <div class="row py-2">
                  <div class="col-sm-12 col-md-12 col-lg-12">
                     <input type="submit" value="Modificar datos" name="modificar" class="btn btn-success btn-sm btn-block">
                  </div>
               </div>
            </div>
          </form>
       </div>
  </div>
</div>
