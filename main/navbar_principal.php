<?php
error_reporting(0);
$fecha = date("d/m/Y");
// consulta para extraer los datos de Notificaciones
$u = $user['Id_Usuarios'];
$n = "SELECT * FROM Notificaciones WHERE Id_User2 = $u and Opc= '0' ";
$not = $conecta->query($n);
$numero = $not->num_rows;
if ($numero > 0) {
  $red.= "<span class='badge badge-pill badge-danger'>$numero</span>";
   while($row = $not->fetch_array()) {
        $mensaje = $row["Mensaje"];
        $y.="<a href='Notificaciones.php' class='nav-link'><p class='text-muted text-lefth'><small> $mensaje </small> </p><div class='dropdown-divider'></div></a>";

   }
}
else{
  $y.="<a href='Notificaciones.php' class='nav-link'><p class='text-muted text-center'><small> Sin Notificaciones</small></p></a>
  <div class='dropdown-divider'></div>";
}
?>
<!-- navbar de la pagina -->
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
  <span class="icon-sliders" id="menu-toggle"> Menú</span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="icon-circle text-success"></span> <?php echo $user['Nombre'] ?> &nbsp; <img src="img/perfil/<?php echo $user['Img']; ?>" alt="Imagen de perfil" style="width:30px; heigth:30px; border-radius:50%;">
        <span class="icon-cog"></span></a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-success" href="#"><span class="icon-calendar-empty"> <?php echo $fecha;?></a>
          <a class="dropdown-item" href="perfil.php"><span class="icon-user"></span> Perfil</a>
          <a class="dropdown-item" href="historial.php"><span class="icon-calendar-2"></span> Historial</a>
          <a class="dropdown-item" href="Configuración.php"><span class="icon-cogs"></span> Configuración</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Modalcerrar" ><span class="icon-off-1"></span> Cerrar Sesion</a>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#"><span class="icon-bell-alt"><?php echo $red; ?></span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <?php echo $y; ?>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><span class="icon-facebook-rect"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><span class="icon-twitter-bird"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><span class="icon-linkedin-rect"></span> | </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#"> Version 1.0 </a>
      </li>
    </ul>
  </div>
</nav>
<!-- temina navbar -->
<!--ventana modal cerrar sesion -->
<div class="modal" tabindex="-1" id="Modalcerrar">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><span class="icon-off"></span> Cerrar Sesion </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Deceas cerrar la sesión? <?php echo $user['Nombre']; ?> <?php echo $user['ApellidoP']; ?> <?php echo $user['ApellidoM']; ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <a href="main/cerrar.php" class="btn btn-danger">Cerrar Sesión</a>
      </div>
    </div>
  </div>
</div>
