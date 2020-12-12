<?php
$inner = "SELECT u.Id_Usuarios, u.Nombre, u.ApellidoP, u.ApellidoM, u.F_Nacimiento, u.Id_Genero, u.Telefono, u.Id_Plantel, u.Id_Tusuario, u.Email, u.Usuario,
u.Password, u.Img, u.Estado, g.Id_Genero, g.NombreG, p.Id_Plantel, p.NombreP, p.Direccion, p.Telefono, t.Id_Tusuario, t.TNombre FROM Usuarios as u INNER JOIN Genero as g ON u.Id_Genero = g.Id_Genero
INNER JOIN Plantel as p ON u.Id_Plantel = p.Id_Plantel INNER JOIN Tusuario as t ON u.Id_Tusuario = t.Id_Tusuario WHERE Usuario = '".$usuario."'";
$join = $conecta->query($inner);
$imprimir = $join->fetch_array();
 ?>
<div class="container" id="perfil">
    <div class="row py-4 text-center">
        <div class="col-sm-10 col-md-10 col-lg-12">
          <img src="img/perfil/<?php echo $user['Img']; ?>" alt="Imagen perfil de usaurio" style="width:250px;" class="rounded-circle">
        </div>
    </div><hr>
    <h3 class="text-center"><?php echo $user['Nombre']; echo "&nbsp".$user['ApellidoP']; echo "&nbsp".$user['ApellidoM']; ?></h3>
    <div class="row py-4">
        <div class="col-sm-7 col-md-7 col-lg-7">
            <div class="card">
                  <div class="card-header bg-dark text-light"><span class="icon-tags"></span> Datos de Perfil</div>
                  <div class="card-body">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><b><span class="icon-phone"></span> Telefono:</b>&nbsp;<?php echo $user['Telefono']; ?></li>
                      <li class="list-group-item"><b><span class="icon-users"></span> Genero:</b>&nbsp;<?php echo $imprimir['NombreG']; ?></li>
                      <li class="list-group-item"><b><span class="icon-sitemap"></span> Tipo de Usuario:&nbsp;</b><?php echo $imprimir['TNombre']; ?></li>
                      <li class="list-group-item"><b><span class="icon-map-signs"></span> Plantel:</b>&nbsp;<?php echo $imprimir['NombreP']; ?></li>
                      <li class="list-group-item"><b><span class="icon-map-o"></span> Direccion:</b>&nbsp;<?php echo $imprimir['Direccion']; ?></li>
                      <li class="list-group-item"><b><span class="icon-envelope-open"></span> Email:</b>&nbsp;<?php echo $user['Email']; ?></li>
                    </ul>
                  </div>
            </div>
        </div>
        <div class="col-sm-5 col-md-5 col-lg-5">
            <div class="card">
                <div class="card-header bg-secondary text-light"><span class="icon-cogs"></span> Acciones de Perfil</div>
                <div class="card-body">
                   <a href="#" class="btn btn-warning btn-sm btn-block"><span class="icon-pencil"></span> Modificar Datos</a>
                    <a href="#" class="btn btn-dark btn-sm btn-block"><span class="icon-pencil"></span> Modificar Password</a>
                   <a href="#" class="btn btn-info btn-sm btn-block" onclick="imprimir();"><span class="icon-print"></span> Imprimir Perfil</a>
                </div>
            </div><br>
           <div class="card">
            <div class="card-header bg-secondary text-light">Estatus a la fecha</div>
            <div class="card-body">
              <h5 class="text-center text-success"><span class="icon-ok"></span> <?php echo $user['Estado'];?></h5>
            </div>
          </div>
        </div>
    </div>
</div>
<script type="text/javascript">
   function imprimir(){
     alert("La proxima clase lo hacemos");
   }
</script>
