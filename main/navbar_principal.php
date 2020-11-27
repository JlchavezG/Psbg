<?php
$fecha = date("d/m/Y"); ?>
<!-- navbar de la pagina -->
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
  <span class="icon-sliders" id="menu-toggle"> Menú</span>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Sistemas <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Fecha : <?php echo $fecha;?></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Bienvenido:  <?php echo $user['Nombre'] ?> <img src="img/perfil/<?php echo $user['Img']; ?>" alt="Imagen de perfil" style="width:30px; heigth:30px; border-radius:50%;">
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="perfil.php"><span class="icon-user"></span> Perfil</a>
          <a class="dropdown-item" href="historial.php"><span class="icon-calendar-2"></span> Historial</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Modalcerrar" ><span class="icon-off-1"></span> Cerrar Sesion</a>
        </div>
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
