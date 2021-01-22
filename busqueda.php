<!-- incluir la base de datos -->
<?php include 'main/conecta.php';
      include 'main/configreg.php';
// guardar sesion
session_start();
error_reporting(0);
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
   $inactivo = 900; // 15 minutos
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
$where = "";
if(!empty($_POST)){
  $valor = $_POST['busqueda'];
  if(!empty($valor)){
    $where = "WHERE Nombre LIKE '%$valor%'";
  }
}
// consulta para extraer a los alumnos que tengan la carrera
$busqueda = "SELECT * FROM Alumnos $where LIMIT 20";
$resultado = $conecta->query($busqueda);
$fila = $resultado->num_rows;
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <!-- utilizar cdn -->
    <meta charset="utf-8">
    <title> Busqueda de Alumnos | IscjlchavezG</title>
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
      <p class="text-center">Busqueda de Alumnos</p>
      <section class="principal">
          <div class="form-1-2">
              <label for="busqueda"> Buscar Alumno por Nombre: </label>
              <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="text" name="busqueda" id="busqueda" class="form-control" placeholder="Buscar">
                <div class="row col-sm-12 col-md-12 col-lg-12 py-4">
                  <input type="submit" name="buscar" value="Buscar" class="btn btn-success btn-sm">
                </div>
              </form>
              <?php if($resultado->num_rows>0){ ?>
              <div class="table-responsive table-hover">
                 <table class="table">
                     <thead class="text-primary">
                       <th class="text-center">Nombre</th>
                       <th class="text-center">Apellido Paterno</th>
                       <th class="text-center">Apeliido Materno</th>
                       <th class="text-center">Fecha de Nacimiento</th>
                       <th class="text-center">Opciones</th>
                     </thead>
                     <tbody>
                       <?php  while($row = $resultado->fetch_assoc()){?>
                         <tr>
                           <td><?php echo $row['Nombre']; ?></td>
                           <td><?php echo $row['ApellidoP']; ?></td>
                           <td><?php echo $row['ApellidoM']; ?></td>
                           <td><?php echo $row['F_Nacimiento']; ?></td>
                           <td class="text-center"><span class="icon-print"></span></td>
                       <?php } ?>
                     </tbody>
                 </table>
               <?php } else {?>
                 <div class="alert alert-danger alert-dismissible fade show" role="alert">
                     <strong>Lo siento no hay datos</strong> Los parametros de busqueda no son correctos.
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                 </div>
               <?php } ?>
              </div>
          </div>
      </section>
    </div>
  </div>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/pace.js"></script>
  <script src="js/buscar_alumno.js"></script>
  <script>
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
  </script>
  </body>
</html>
