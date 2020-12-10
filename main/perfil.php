<div class="container" id="perfil">
    <div class="row py-4 text-center">
        <div class="col-sm-10 col-md-10 col-lg-12">
          <img src="img/perfil/<?php echo $user['Img']; ?>" alt="Imagen perfil de usaurio" style="width:250px;" class="rounded-circle">
        </div>
    </div><hr>
    <h3 class="text-center"><?php echo $user['Nombre']; echo "&nbsp;" .$user['ApellidoP']; echo "&nbsp;" .$user['ApellidoM']; ?></h3>
    <div class="row py-4">
        <div class="col-sm-7 col-md-7 col-lg-7">
            <div class="card">
                  <div class="card-header bg-dark text-light"><span class="icon-tags"></span> Datos de Perfil</div>
                  <div class="card-body">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><b><span class="icon-phone"></span> Telefono:</b>&nbsp;<?php echo $user['Telefono']; ?></li>
                      <li class="list-group-item"><b><span class="icon-users"></span> Genero:</b>&nbsp;<?php echo $user['Id_Genero']; ?></li>
                      <li class="list-group-item"><b><span class="icon-sitemap"></span> Tipo de Usuario:</b>&nbsp;<?php echo $user['Id_Tusuario']; ?></li>
                      <li class="list-group-item"><b><span class="icon-map-signs"></span> Plantel:</b>&nbsp;<?php echo $user['Id_Plantel']; ?></li>
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
              <h5 class="text-center text-success"><?php echo $user['Estado'];?></h5>
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
