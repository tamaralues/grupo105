<?php
require("../configuracion/conexion_db_e3.php");
include_once '../include/user.php';
include_once '../include/user_session.php';

$user_session = new userSession();
$user = new User($db);

$post_username = $_POST['username'];

if (isset($_SESSION['user'])){
   # echo "<p>hay sesion iniciada</p>";
    $user->setUser($user_session->getCurrentUser());}
else{
    #echo "<p>iniciando sesion: $post_username</p>";
$user_session -> setCurrentUser($post_username);
$user -> setUser($post_username);
}
    $uid = $_SESSION['id'];


    $query_drop4 = "SELECT nombreciudad, cid_destino, horasalida, medio FROM datos_viaje natural join ciudades where datos_viaje.cid_destino = ciudades.cid ;";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
     $result_drop4 = $db -> prepare($query_drop4);
     $result_drop4 -> execute();
     $fetch_drop4 = $result_drop4 -> fetchAll();

     $query_drop5 = "SELECT nombreciudad, cid_origen, horasalida FROM datos_viaje natural join ciudades where datos_viaje.cid_origen = ciudades.cid ;";
     #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
      $result_drop5 = $db -> prepare($query_drop5);
      $result_drop5 -> execute();
      $fetch_drop5 = $result_drop5 -> fetchAll();

      $query_drop6 = "SELECT uid , tid FROM tickets_comprados where uid = '$uid';";
      #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
       $result_drop6 = $db -> prepare($query_drop6);
       $result_drop6 -> execute();
       $fetch_drop6 = $result_drop6 -> fetchAll();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrapE3.css" rel="stylesheet">
    <link href="css/estiloE3.css" rel="stylesheet">
    <title>Compra de tickets</title>
</head>

<body>
<?php
    $path_navbar ='../';
    include_once '../nav_bar.php';
    ?>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-dark border-bottom shadow-sm">
        <nav class="my-2 my-md-0 mr-md-3">
        <div class="btn-group">
          <form action ="confirmacion_compra.php" method="POST">
                <div class="btn-group" role="group">
                    <select name="origen" >
                        <?php
                        foreach ($fetch_drop5 as $f5) {
                            echo "
                                <option value = '$f5[1]' > $f5[0] </option>
                            ";
                        }
                        ?>
                    </select>
                </div>
                <div class="btn-group" role="group">

                    <select name="destino" >
                        <?php
                        foreach ($fetch_drop4 as $f4) {
                            echo "
                                <option value = '$f4[1]' > $f4[0] </option>
                            ";
                        }
                        ?>
                    </select>
                </div>
                <div class="btn-group" role="group">
                    <select name="medio" >
                        <?php
                        foreach ($fetch_drop4 as $f4) {
                            echo "
                                <option value = '$f4[3]' > $f4[3] </option>
                            ";
                        }
                        ?>
                    </select>
                </div>
                <div class="btn-group" role="group">
                    <select name="horasalida" >
                        <?php
                        foreach ($fetch_drop4 as $f4) {
                            echo "
                                <option value = '$f4[2]' > $f4[2] </option>
                            ";
                        }
                        ?>
                    </select>
                </div>

                <input type="date" class="form-control" name="fechaviaje" aria-describedby="emailHelp" placeholder="ingrese la fecha de salida">
                <br>
                <button type="submit" class="btn btn-dark btn-block mb-2">
                    Comprar
                </button>
                </form>
            </div>
    </div>

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
            foreach ($fetch_drop6 as $p) {
              echo "<tr><td>$p[0]</td><td>$p[1]</td></tr>";
          }
          ?>
        </table>
      </div>
    </div>



      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
      <script src="css/bootstrap.js"></script>
</body>
</html>
