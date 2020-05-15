<?php
    session_start();
    require("../configuracion/conexion_db_e3.php");

    $fechainicio = $_POST["fechainicio"];
    $fechatermino = $_POST["fechatermino"];
    $hotel = $_POST["hotel1"];
    $hid = $_POST["hid"];

    $user = $_SESSION['username'];
    $uid = $_SESSION['id'];

    $query_rid = "SELECT rid FROM reservas;";
    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
      $result_rid = $db -> prepare($query_rid);
      $result_rid -> execute();
      $fetch_rid = $result_rid -> fetchAll();

      $last_rid = 0;

      foreach ($fetch_rid as $p) {
        if ($last_rid < $p[0]){
          $last_rid=$p[0];
        }
    }

    $last_rid += 1;

    $query_hoteles = "INSERT INTO reservas(rid,hid, uid_reserva,fechainicio, fechatermino) VALUES ('$last_rid', '$hid', '$uid', '$fechainicio','$fechatermino');";

    $query = "SELECT uid_reserva FROM reservas WHERE uid_reserva = '$uid' ;";
    $result = $db -> prepare($query);
    $result -> execute();
    $reservas = $result -> fetchAll();


?>


<body>
  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h3 class="display-4">Resultado inserción</h3>
  </div>
  <div class="container">
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <thead class="thread-dark">
          <tr>
            <th>ID del usuario</th>

          </tr>
        </thead>
        <?php
          foreach ($reservas as $p) {
            echo "<tr><td>$p[0]</td></tr>";
        }
        ?>
      </table>
    </div>
  </div>
</body>


<?php echo "<p>$user</p>"; ?>
<?php echo "<p>$uid</p>"; ?>
<?php echo "<p>$last_rid</p>"; ?>
<?php echo "<p>$$hotel</p>"; ?>
<?php echo "<p>$fechainicio</p>"; ?>
<?php echo "<p>$fechatermino</p>"; ?>
