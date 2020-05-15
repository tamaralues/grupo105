<?php
    session_start();
    require("../configuracion/conexion_db_e3.php");

    $comentario = $_POST["comentario"];
    $hid = $_POST["hid"];

    $user = $_SESSION['username'];
    $uid = $_SESSION['id'];

    $query_cmid = "SELECT cmid FROM comentarios;";
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

    if ($last_cmid != 0){
        $last_cmid += 1;
    }

    $query_comentarios = "INSERT INTO comentarios(cmid, hid, uid, comentario) VALUES ('$last_cmid', '$hid', '$uid', '$comentario');";
    $result_comentarios = $db -> prepare($query_comentarios);
    $bool_comentarios = $result_comentarios -> execute();


?>

<?php echo "<p>$user</p>"; ?>
<?php echo "<p>$uid</p>"; ?>
<?php echo "<p>$hid </p>"; ?>
<?php echo "<p>$last_cmid</p>"; ?>
<?php echo "<p>$comentario</p>"; ?>
