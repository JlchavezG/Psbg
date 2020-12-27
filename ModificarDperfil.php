<!-- incluir la base de datos -->
<?php include 'main/conecta.php';
      include 'main/configreg.php';
// guardar sesion
session_start();
// validando usuario
$usuario = $_SESSION['Usuario'];
if (!isset($usuario)) {
   header("location:index.php");
}
// consulta para extraer todos los campo de el usuario en la sesion
$Q= "SELECT * FROM Usuarios WHERE Usuario = '".$usuario."'";
$extraer = $conecta->query($Q);
$dupla = $extraer->fetch_array();
if ($dupla > 0) {
  $user = $dupla;
}
// validacion de expirar sesion por tiempo
if (isset($_SESSION['time'])) {
   // damos el timepo en segundo para determinar cuando expira la sesion
   $inactivo = 300; // 5 minutos
   // se calcula el tiempo inactivo ene l aplicativo
   $tiempo = time() - $_SESSION['time'];
   // verificamos si el tiempo pasa lo establecido para cerrar la sesion y redirigir
   if ($tiempo > $inactivo) {
     //Olvidamos la Sesion
     session_unset();
     //destruimos la session
     session_destroy();
     //redirigimos ala pagina principal de login
     header("location:index.php");
     exit();
   }
}
$_SESSION['time'] = time();
// consulta para modificar el perfil
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
if ($resultado > 0) {
  header("location:Perfiles.php");
}
else {
  $alerta.="<div class='alert alert-danger alert-dismissible fade show shadow-lg p-3 mb-5 bg-white rounded' role='alert'>
                <strong>Error al realizar los cambios</strong> Existe un problema al realizar los cambios solicitados por favor comunicate a soporte.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                   <span aria-hidden='true'>&times;</span>
                </button>
              </div>";
}
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- utilizar cdn -->
    <meta charset="utf-8">
    <title> Modificar datos de Perfil | IscjlchavezG</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/fontello.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/simple-sidebar.css">
    <link rel="stylesheet" href="css/pace.css">
    <!-- mandamos llamar jquery -->
    <script src="js/jquery-3.5.1.min.js"></script>
  </head>
  <body>
    <!-- incluyendo la pagina siderbar.php -->
    <?php
    // declara una variable
    $Tdash = $user['Id_Tusuario'];
    // validar o comparar el tipo de dato para determinar la accion
    if($Tdash == 1){include 'main/sidebarS.php';}
    else if($Tdash == 2){include 'main/sidebarA.php';}
    else if($Tdash == 3){include 'main/sidebarU.php';}
     ?>
    <div id="page-content-wrapper">
    <!-- incluir a hora navbar -->
    <?php include 'main/navbar_principal.php';?>
   <div class="container py-4">
      <h4 class="text-center py-2"> Modifica tus datos</h4>
         <div class="col-sm-12 col-md-12 col-lg-12">
           <div class="container py-4">
             <div class="row py-3 text-center ">
                <p class="text-center text-muted"> El perfil de usuario a modificar pertenece a : <b><?php echo $perfil['Nombre']; echo "&nbsp;".$perfil['ApellidoP'];
                 echo "&nbsp;".$perfil['ApellidoM']; ?></b> Por favor verifca tus datos a modificar antes de guardar</p>
             </div>
             <hr>
             <div class="row py-3">
                  <div class="container">
                     <form name="modificarp" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                       <div class="col-sm-12 col-md-12 col-lg-12">
                           <input type="hidden" value="<?php echo $perfil['Id_Usuarios']; ?>" name="id" class="form-control" placeholder="Id">
                           <input type="text" value="<?php echo $perfil['Nombre']; ?>" name="nombre" class="form-control" placeholder="Nombre">
                       </div>
                       <div class="col-sm-12 col-md-12 col-lg-12">
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
                            <div class="col">
                              <div class="custom-control custom-switch">
                                 <input type="checkbox" class="custom-control-input" name="checkbox" id="checkbox" onclick="habilitar();">
                                 <label for="checkbox" class="custom-control-label">Verifique mis datos</label>
                              </div>
                            </div>
                          </div>
                          <div class="row py-2">
                             <div class="col-sm-12 col-md-12 col-lg-12">
                                <input type="submit" value="Modificar datos" name="modificar" class="btn btn-success btn-sm btn-block" disabled>
                             </div>
                          </div>
                       </div>
                     </form>
                  </div>
             </div>
           </div>
           <!-- firma -->
           <div class="row justify-content-center align-items-center">
              <img src="img/firma.png" alt="firma jose luis chavez g">
           </div>
           </div>
           <div class="container py-2">
              <p class="text-center">IscjlchavezG@desarrollorWeb</p>
           </div>
           <!-- temina firma -->
    </div>
  </div>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/pace.js"></script>
  <script type="text/javascript">
    function habilitar(){
      document.modificarp.modificar.disabled = !document.modificarp.checkbox.checked;
    }
  </script>
  <script>
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
  </script>
  </body>
</html>
