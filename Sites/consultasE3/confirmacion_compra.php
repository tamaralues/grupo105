<?php
    session_start();

    require("../configuracion/conexion_db_e3.php");

    $origen = $_POST["origen"];
    $destino = $_POST["destino"];
    $horasalida = $_POST["horasalida"];
    $medio =  $_POST["medio"];
    $fechaviaje = $_POST["fechaviaje"];

    $cid_origen =  0;
    $cid_destino = 0;

    $query_drop1 = "SELECT cid FROM ciudades  where nombreciudad = '$destino';";
   #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result_drop1 = $db -> prepare($query_drop1);
    $result_drop1 -> execute();
    $fetch_drop1 = $result_drop1 -> fetchAll();

    foreach ($fetch_drop1 as $f1) {
      # obtengo la cantida de tickets comprados
      $cid_destino = $f1[0];
    }

    $query_drop2 = "SELECT cid FROM ciudades where nombreciudad = '$origen';";
   #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result_drop2 = $db -> prepare($query_drop2);
    $result_drop2 -> execute();
    $fetch_drop2 = $result_drop2 -> fetchAll();

    foreach ($fetch_drop2 as $f2) {
      # obtengo la cantida de tickets comprados
      $cid_origen = $f2[0];
    }


    $query_drop4 = "SELECT did, cid_origen, capacidad FROM datos_viaje  where cid_destino = '$cid_destino',cid_origen = '$cid_origen', horasalida = '$horasalida', medio = '$medio' ;";
   #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result_drop4 = $db -> prepare($query_drop4);
    $result_drop4 -> execute();
    $fetch_drop4 = $result_drop4 -> fetchAll();

    $user = $_SESSION['username'];
    $uid = $_SESSION['id'];

    $fechacompra = date('Y-m-d H:i:s');
    echo  $fechacompra ;

     $query_drop4 = "SELECT did, cid_origen, capacidad FROM datos_viaje  where cid_destino = '$destino',cid_origen = '$origen', horasalida = '$horasalida', medio = '$medio' ;";
    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
     $result_drop4 = $db -> prepare($query_drop4);
     $result_drop4 -> execute();
     $fetch_drop4 = $result_drop4 -> fetchAll();

     $count = 0;
     $did = 0;
     $capacidad_ocupada = 0;
     $asiento = 0;

     foreach ($fetch_drop4 as $f4) {
       # obtengo la cantida de tickets comprados
       $capacidad_ocupada += 1;
     }

     foreach ($fetch_drop4 as $f4) {
       if($f4[1] = $origen){
         if ($capacidad_ocupada < $f4[2] ) {
           $did = $f4[0];
           echo "<p>$did did </p>";
           $count = 1;
         }
        }
       else{
         $count = 0;
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
           echo "<p>$last_tick tick </p>";
         }
         if ($asiento < $p[1]){
           $asiento = $p[1] + 1 ;
         }
     }

     if($count = 1){

       $query_add = "INSERT INTO tickets_comprados VALUES ('$last_tick ', '$did', '$uid','$asiento', '$fechacompra', '$fechaviaje' );";
       $result_add = $db  -> prepare($query_add);
       $result_add -> execute();
       echo "<p>La compra fue realizada con exito </p>";
     }
     else{
       echo "<p>lo siento no se pudo realizar la compra</p>";
     }
?>

<?php echo "<p>$capacidad_ocupada capacidad ocupada</p>"; ?>
<?php echo "<p>$capacidad capacidad </p>"; ?>
<?php echo "<p>$fechaviaje fecha viaje </p>"; ?>
<?php echo "<p>$uid uid </p>"; ?>
<?php echo "<p>$did did </p>"; ?>
<?php echo "<p>$asiento asiento </p>"; ?>
<?php echo "<p>$fechacompra fecha compra </p>"; ?>
<?php echo "<p>$horasalida hora salida</p>"; ?>
<?php echo "<p>$cid_origen cid origen</p>"; ?>
<?php echo "<p>$cid_destino cid destino</p>"; ?>
<?php echo "<p>$origen origen </p>"; ?>
<?php echo "<p>$destino destino </p>"; ?>
