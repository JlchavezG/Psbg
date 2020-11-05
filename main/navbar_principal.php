<link rel="stylesheet" href="css/main.css">
<!-- navbar de la pagina -->
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
  <span class="icon-sliders" id="menu-toggle"> Menú</span>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Bienvenido:  <?php echo $usuario; ?>  <img src="img/perfil/yo.jpg" alt="Imagen de perfil" style="width:30px; heigth:30px; border-radius:50%;">
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><span class="icon-user"></span> Perfil</a>
          <a class="dropdown-item" href="#"><span class="icon-calendar-2"></span> Historial</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="main/cerrar.php"><span class="icon-off-1"></span> Cerrar Sesion</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<!-- temina navbar -->
