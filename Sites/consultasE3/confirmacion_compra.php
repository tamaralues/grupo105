<?php
    session_start();

    require("../configuracion/conexion_db_e3.php");

    $origen = $_POST["name"];
    $destino = $_POST["destino"];
    $horasalida = $_POST["horasalida"];
    $medio =  $_POST["medio"];

    $query_drop4 = "SELECT did, cid_origen FROM datos_viaje  where cid_destino = '$destino'   ,cid_origen = '$origen', horasalida = '$horasalida', medio = '$medio' ;";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
     $result_drop4 = $db -> prepare($query_drop4);
     $result_drop4 -> execute();
     $fetch_drop4 = $result_drop4 -> fetchAll();

     $count = 0;

     foreach ($fetch_drop4 as $f4) {
       if($fetch_drop4[1] = $origen ){
         $count = 1;
       }else{
         $count = 0;
       }
     }

     if($count = 1){
       echo "<p>La compra fue realizada con exito </p>";
     }else{
       echo "<p>lo siento no se pudo realizar la compra</p>";
     }

?>
