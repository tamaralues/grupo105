<?php
    session_start();

    require("../configuracion/conexion_db_e3.php");

    $origen = $_POST["origen"];
    $destino = $_POST["destino"];
    $horasalida = $_POST["horasalida"];
    $medio =  $_POST["medio"];
    $fechaviaje = $_POST["fechaviaje"];

    $user = $_SESSION['username'];
    $uid = $_SESSION['id'];

    $fechacompra =  getdate();

     $query_drop4 = "SELECT did, cid_origen, capacidad FROM datos_viaje  where cid_destino = '$destino'   ,cid_origen = '$origen', horasalida = '$horasalida', medio = '$medio' ;";
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
       if($f4[1] = $origen && $capacidad_ocupada < $f4[2] ){
         $count = 1;
         $did = $f4[0];

       }else{
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
         }
         if ($asiento < $p[1]){
           $asiento = $p[1] + 1 ;
         }
     }

     if($count = 1){
       echo "<p>La compra fue realizada con exito </p>";
       $query_add = "INSERT INTO tickets_comprados VALUES ('$last_tick ', '$did', '$uid','$asiento', '$fechacompra', '$fechaviaje' );";
       $result_add = $db  -> prepare($query_add);
       $result_add -> execute();
     }else{
       echo "<p>lo siento no se pudo realizar la compra</p>";
     }
?>

<?php echo "<p>$capacidad_ocupada</p>"; ?>
<?php echo "<p>$fechaviaje</p>"; ?>
