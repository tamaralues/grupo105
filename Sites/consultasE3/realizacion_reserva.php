<?php
    session_start();
    require("../configuracion/conexion_db_e3.php");
    require("../configuracion/conexion.php");

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
          $last_rid = $p[0];
        }
    }

    $last_rid += 1;

    $query_hoteles = "INSERT INTO reservas VALUES ('$last_rid', '$uid', '$fechainicio','$fechatermino', '$hid');";
    $result_hoteles = $db -> prepare($query_hoteles);
    $result_hoteles -> execute();

    $query_uid = "SELECT uid FROM reservas where hid = '$hid';";
    $result_uid = $db -> prepare($query_uid);
    $result_uid -> execute();
    $fetch_uid= $result_uid -> fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../css/bootstrapE3.css" rel="stylesheet">
    <link href="../css/estiloE3.css" rel="stylesheet">
    <title>Compra de tickets</title>
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
          <?php echo "<p>Hotel: $hotel </p>"; ?>
          <?php echo "<p>Fecha de entrada: $fechainicio </p>"; ?>
          <?php echo "<p>Fecha de salida: $fechatermino </p>"; ?>
          <?php echo "<p>Id Reserva : $last_rid </p>"; ?>

        </div>
      </main>

  <form action ="consultas_hotel.php" method="POST">
        <input type="hidden" name="hotel" value= "<?php echo $hid ;?>"  >
        <br>
        <button type="submit" class="btn btn-dark">
            Volver
        </button>
  </form>

  </div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="../css/bootstrap.js"></script>
</body>
</html>
