<?php
    session_start();

    require("../configuracion/conexion_db_e3.php");

    $origen = $_POST["origen"];
    $destino = $_POST["destino"];
    $horasalida = $_POST["horasalida"];
    $medio =  $_POST["medio"];
    $fechaviaje = $_POST["fechaviaje"];
    $nombre_origen = $_POST["nombre_origen"];
    $nombre_destino = $_POST["nombre_destino"];

    $user = $_SESSION['username'];
    $uid = $_SESSION['id'];

    $fechacompra = date('Y-m-d H:i:s');
    echo  $fechacompra ;

     $query_drop8 = "SELECT did, cid_origen, capacidad FROM datos_viaje natural join tickets_comprados where cid_origen = '$origen' and cid_destino = '$destino'and horasalida = '$horasalida' and  medio = '$medio' ;";
    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
     $result_drop8 = $db -> prepare($query_drop8);
     $result_drop8 -> execute();
     $fetch_drop8 = $result_drop8 -> fetchAll();

     $count = -1;
     $did = 0;
     $capacidad_ocupada = 0;
     $asiento = 0;

     foreach ($fetch_drop8 as $f8) {
       # obtengo la cantida de tickets comprados
       $capacidad_ocupada++ ;
       $capacidad = $f8[2];
     }

     foreach ($fetch_drop8 as $f8) {
       if($f4[1] = $origen){
         if ($capacidad_ocupada < $f8[2] ) {
           $did = $f8[0];
           $count = 1;
         }
        }
       else{
         $count = -1;

       }
     }

       $query_tick = "SELECT tid, asiento FROM tickets_comprados;";
       #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
       $result_tick = $db -> prepare($query_tick);
       $result_tick -> execute();
       $fetch_tick = $result_tick -> fetchAll();
       $last_tick = 0;

       foreach ($fetch_tick as $p) {
         if ($last_tick < $p[0]){
           $last_tick = $p[0];
         }
         if ($asiento < $p[1]){
           $asiento = $p[1] + 1 ;
         }
     }
      $last_tick += 1;
      $asiento += 1 ;

     if($count != -1){
       $query_add = "INSERT INTO tickets_comprados VALUES ('$last_tick ', '$did', '$uid','$asiento', '$fechacompra', '$fechaviaje' );";
       $result_add = $db  -> prepare($query_add);
       $result_add -> execute();
       echo "<p>La compra fue realizada con exito </p>";
     }
     else{
       echo "<p>La compra no fue realizada con exito </p>";
     }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../css/bootstrapE3.css" rel="stylesheet">
    <link href="../css/estiloE3.css" rel="stylesheet">
</head>

<body>

  <?php
    $path_navbar ='../';
    include_once '../nav_bar.php';
  ?>

<div class="container px-4 py-2" style="width:90%; margin-top: 100px;">

    <main role="main" class="container container-carrusel">
      <h3>Información reserva</h3>
      <br>
      <div >
        <?php echo "<p> Nombre usuario: $user  </p>"; ?>
        <?php echo "<p>Fecha compra: $fechacompra </p>"; ?>
        <?php echo "<p>Ciudad de origen: $nombre_origen </p>"; ?>
        <?php echo "<p>Ciudad de destino: $nombre_destino </p>"; ?>
        <?php echo "<p>Fecha de viaje: $fechaviaje </p>"; ?>
        <?php echo "<p>Hora salida: $horasalida </p>"; ?>
        <?php echo "<p>Asiento: $asiento</p>"; ?>
        <?php echo "<p>Id Ticket: $last_tick </p>"; ?>
      </div>
    </main>

<form action ="comprar_tickets.php" method="POST">
      <br>
      <button type="submit" class="btn btn-dark">
          Volver
      </button>
</form>

</div>

</body>
