<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- utilizar cdn -->
    <meta charset="utf-8">
    <title> Practica Juego | IscjlchavezG</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/fontello.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/simple-sidebar.css">
    <!-- mandamos llamar jquery -->
    <script src="js/jquery-3.5.1.min.js"></script>
  </head>
  <body>
  <h3 class="text-center text-muted">Juego de numero con Php</h3>
   <div class="row py-4">
     <div class="container">
       <p class="text-justify">Dispones de un credito virtual inicial de 5000 mil pesos Mexicanos, debes escoger el numero premiado de el 1 a 3,
       si aciertas tu saldo se duplicara, si no aciertas tu saldo disminuira la mitad, si no eliges numero se tomara por default el 1</p>
       <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
         <p class="text-center">Elige el numero:</p>
         <input type="radio" name="numero" value="1" checked = "checked"> 1..
         <input type="radio" name="numero" value="2"> 2..
         <input type="radio" name="numero" value="3"> 3..
         <br><hr>
         <input type="submit" name="jugar" value="jugar" class="btn btn-success">
         <?php
          error_reporting(0);
          $numero = $_POST['numero'];
          $modo = $_POST['modo'];
          if($modo == ""){
            $saldo = 5000;
          }
          else{
            $saldo = $_POST['saldo'];
          }
          $z = mt_rand(1,3);
          if ($modo == "1") {
            echo "<p>Dinero apostado:<b>$saldo Pesos Mexicanos</b.></p>";
            echo "<p>Tu has seleccionado el numero: <b> $numero</b>.</p>";
            echo "<p>El numero Premiado es: <b> $z </b>.</p>";
            // verificar si se gano o no
            if($numero == $z){
              echo "Genial has seleccionado el numero ganador se a duplicado tu saldo";
              $saldo = $saldo*2;
            }
            else{
              echo "Lo sentimos el numero que seleccionaste no fue premiado tu saldo se reduce a la Mitad";
              $saldo = $saldo/2;
            }
             echo "Ahora tines un saldo total de <b> $saldo Pesos Mexicanos</b>";
          }
          else{
            echo "<p>Dispones de la siguiente cantidad de dinero inicial : <b> $saldo Pesos Mexicanos.</b></p>
            <p>Elige un numero y pulsa jugar para iniciar el juego.</p>";
          }
          $modo = 1;
          echo "<input type='hidden' name='saldo' value='$saldo'>";
          echo "<input type='hidden' name='modo' value='$modo'>";
        ?>
       </form>
       <h4>Si quieres volver a jugar otro juego pulsa aqui:</h4>
       <?php
        $modo = "";
        $saldo = 5000;
        echo "<input type=\"hidden\" name=\"saldo\" value=\"$saldo\" />";
        echo "<input type=\"hidden\" name=\"modo\" value=\"$modo\" />";
        ?>
        <input type="submit" name="" value="Volver a jugar con 5000 pesos">
     </div>
     </div>
  <script src="js/bootstrap.min.js"></script>
  </body>
</html>
