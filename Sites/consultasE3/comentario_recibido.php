<?php
    session_start();

    require("../configuracion/conexion_db_e3.php");

    $comentario = $_POST["comentario"];
    $hid = $_POST["hid"];

    $user = $_SESSION['username'];
    $uid = $_SESSION['id'];

    $query_cmid = "SELECT * FROM comentarios;";
    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
      $result_cmid = $db -> prepare($query_cmid);
      $result_cmid -> execute();
      $fetch_cmid = $result_cmid -> fetchAll();

      $last_cmid = 0;

      foreach ($fetch_cmid as $p) {
        if ($last_cmid < $p[0]){
          $last_cmid = $p[0];
        }
    }

    $last_cmid += 1;

    $query_add = "INSERT INTO comentarios VALUES ('$last_cmid', '$hid', '$uid', '$comentario');";
    $result_add = $db  -> prepare($query_add);
    $result_add -> execute();


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

  <div>Comentario fue recibido con éxito</div>
  <a <p href="consultas_hotel.php">Volver atrás</a></p>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
      <script src="../css/bootstrap.js"></script>
</body>
</html>
