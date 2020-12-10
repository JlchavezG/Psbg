<div class="container">
    <div class="row py-4 text-center">
        <div class="col-sm-10 col-md-10 col-lg-12">
          <img src="img/perfil/<?php echo $user['Img']; ?>" alt="Imagen perfil de usaurio" style="width:250px;" class="rounded-circle">
        </div>
    </div><hr>
    <p class="text-center"><?php echo $user['Nombre']; echo $user['ApellidoP']; echo "&nbsp;" .$user['ApellidoM']; ?></p>
    <div class="row py-4">
        <div class="col-sm-7 col-md-7 col-lg-7">
            <div class="card">
                  <div class="card-header bg-success text-light">Datos de Perfil</div>
                  <div class="card-body">

                      
                </div>
            </div>
        </div>
        <div class="col-sm-5 col-md-5 col-lg-5">
            <div class="card">
                <div class="card-header bg-secondary text-light">Acciones de Perfil</div>
                <div class="card-body">
                   <a href="#" class="btn btn-warning btn-sm btn-block">Modificar Perfil</a>
                   <a href="#" class="btn btn-info btn-sm btn-block" onclick="imprimir();">Imprimir perfil</a>
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
