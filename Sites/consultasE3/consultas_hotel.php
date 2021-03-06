<?php
    #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    #Se obtiene el valor del input del usuario

require("../configuracion/conexion_db_e3.php");

include_once '../include/user.php';
include_once '../include/user_session.php';

$user_session = new userSession();
$user = new User($db);

$post_username = $_POST['username'];

if (isset($_SESSION['user'])){
    #echo "<p>hay sesion iniciada</p>";
    $user->setUser($user_session->getCurrentUser());}
else{
$user_session -> setCurrentUser($post_username);
$user -> setUser($post_username);
}

    $hid = $_POST["hotel"];
    $query = "SELECT hid, nombrehotel FROM hoteles;";

		$result = $db -> prepare($query);
    $result -> execute();
    $hid1 = $result -> fetchAll();

		foreach ($hid1 as $p){
			if($p[0] == $hid){
				$hotel = $p[1];
			}
		}

    $query_comentarios = "SELECT username, comentario FROM comentarios natural join usuarios WHERE hid = '$hid';";
    $result_cm = $db -> prepare($query_comentarios );
    $result_cm -> execute();
    $consulta = $result_cm -> fetchAll();

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset='UTF-8'>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="../css/bootstrapE3.css" rel="stylesheet">
      <link href="../css/estiloE3.css" rel="stylesheet">
      <title>Documento random</title>
  </head>

  <body>
    <?php
      $path_navbar ='../';
      include_once '../nav_bar.php';
    ?>
<div class="container px-4 py-2" style="width:90%; margin-top: 100px;">
  <?php echo "<h3 class=\"my-0 font-weight-normal\">$hotel</h3>"; ?>

      <div >
        <br>
        <h4 >Realizar reserva</h4>
        </div>
      <div class="card-body">
        <ul class="list-unstyled mt-3 mb-4">
        </ul>
        <form align="center" action="confirmacion_reserva.php" method="post">
          <input type="hidden" name="hotel" value= "<?php echo $hotel ;?>"  >
          <input type="hidden" name="username" value= "<?php echo $post_username;?>">
          <br>
          <button type="submit" class="btn btn-dark">Reservar</button>
        </form>
      </div>


    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Cuentanos tu experiencia</h4>
        </div>
      <div class="card-body">
        <ul class="list-unstyled mt-3 mb-4">
        </ul>
        <form align="center" action="comentario_recibido.php" method="post">
          <input type="hidden" name="hid" value= "<?php echo $hid ;?>"  >
          <input type="text" class="form-control" name="comentario" aria-describedby="emailHelp" placeholder="">
          <br>
          <input type="hidden" name="username" value= "<?php echo $post_username;?>">
          <button type="submit" class="btn btn-dark">Comentar</button>
        </form>
      </div>
    </div>

        <div class="container">
          <div class="card-deck mb-3 text-center" style="align-self:center">
              <table class="table table-striped table-bordered" style="width:70%; margin:auto">
                <thead class="thread-dark">
                  <tr>
                    <th>Username</th>
                    <th>Comentario</th>
                  </tr>
                </thead>
                <?php
                  foreach ($consulta as $p) {
                    echo "
                    <tr><td><img class=\"img-fluid d-block rounded\" style=\"width: 20%;\"
                    src=\"https://s.ppy.sh/a/\" />
                    $p[0]</td><td>$p[1]</td></tr>";
                }
                ?>
              </table>
          </div>
        </div>


  </div>

  </body>

    <body>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
      <script src="../css/bootstrap.js"></script>
  </body>
  </html>
