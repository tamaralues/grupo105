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

    if ($last_cmid != 0){
        $last_cmid += 1;
    }

    $query_add = "INSERT INTO comentarios VALUES ('$last_cmid', '$hid', '$uid', '$comentario');";
    $result_add = $db  -> prepare($query_add);
    $result_add -> execute();

    $query_comentarios = "SELECT comentario FROM comentarios;";
    $result_cm = $db -> prepare($query_comentarios );
    $result_cm -> execute();
    $consulta = $result_cm -> fetchAll();

?>

<?php echo "<p>$user</p>"; ?>
<?php echo "<p>$uid</p>"; ?>
<?php echo "<p>$hid </p>"; ?>
<?php echo "<p>$last_cmid</p>"; ?>
<?php echo "<p>$comentario</p>"; ?>

<div class="container">
  <div class="card-deck mb-3 text-center" style="align-self:center">
    <div class="table-responsive" style="align-self:center">
      <table class="table table-striped table-bordered" style="width:70%; margin:auto">
        <thead class="thread-dark">
          <tr>
            <th>uid</th>
          </tr>
        </thead>
        <?php
          foreach ($consulta as $p) {
            echo "<tr><td>$p[0]<td></tr>";
        }
        ?>
      </table>
    </div>
  </div>
</div>
