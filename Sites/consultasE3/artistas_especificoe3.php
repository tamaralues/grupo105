<?php
require("../configuracion/conexion_db_e3.php");
include_once '../include/user.php';
include_once '../include/user_session.php';

$user_session = new userSession();
$user = new User($db);

$post_username = $_POST['username'];

if (isset($_SESSION['user'])){
   # echo "<p>hay sesion iniciada</p>";
    $user->setUser($user_session->getCurrentUser());
    }
else{
    #echo "<p>iniciando sesion: $post_username</p>";
  $user_session -> setCurrentUser($post_username);
  $user -> setUser($post_username);

}
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

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../configuracion/conexion.php");

  #Se obtiene el valor del input del usuario
  $idartista = (int)($_POST["artista"]);

  $artista_imagen = "";

  if($idartista == 1){
    $artista_imagen = "https://upload.wikimedia.org/wikipedia/commons/0/00/Andrea_Mantegna_049_detail_possible_self-portrait.jpg";
  }
  elseif($idartista == 2){
    $artista_imagen = "https://vignette.wikia.nocookie.net/theassassinscreed/images/6/6a/Andrea-del-verrocchio-1-sized.jpg/revision/latest/top-crop/width/360/height/450?cb=20110422234830&path-prefix=es";
  }
  elseif($idartista == 3){
    $artista_imagen = "https://upload.wikimedia.org/wikipedia/commons/3/35/Vite_de_pi%C3%B9_eccellenti_pittori_scultori_ed_architetti_%281767%29_%2814597572560%29.jpg";
  }
  elseif($idartista == 4){
    $artista_imagen = "https://historia-arte.com/_/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpbSI6WyJcL2FydGlzdFwvaW1hZ2VGaWxlXC9iaWxkLW90dGF2aW9fbGVvbmlfY2FyYXZhZ2dpby5qcGciLCJyZXNpemVDcm9wLDQwMCw0MDAsQ1JPUF9FTlRST1BZIl19.1jyWicmcmhjD2HUyZ71ftRHCfe8b7Y/uWLJ-vx_w-Qvk.jpg";
  }
  elseif($idartista == 5){
    $artista_imagen = "https://www.biografiasyvidas.com/biografia/d/fotos/donatello.jpg";
  }
  elseif($idartista == 6){
    $artista_imagen = "https://upload.wikimedia.org/wikipedia/commons/9/9d/Eugene_delacroix.jpg";
  }
  elseif($idartista == 7){
    $artista_imagen = "https://upload.wikimedia.org/wikipedia/commons/0/0b/Fede_Galizia_-_Portrait_of_Federico_Zuccari_-_WGA8432.jpg";
  }
  elseif($idartista == 8){
    $artista_imagen = "";
  }
  elseif($idartista == 9){
    $artista_imagen = "https://1.bp.blogspot.com/--KIKtapkO3w/WhmboHFDGqI/AAAAAAABBWQ/-ipO8dWN0e4t2bsjne6ft7t6uISXgZvDQCLcBGAs/s1600/01.jpeg";
  }
  elseif($idartista == 10){
    $artista_imagen = "https://www.biografiasyvidas.com/biografia/b/fotos/bernini.jpg";
  }
  elseif($idartista == 11){
    $artista_imagen = "https://www.descubrirelarte.es/wp-content/uploads/2019/12/DETALLE-RETRATO-VASARI.jpg";
  }
  elseif($idartista == 12){
    $artista_imagen = "https://upload.wikimedia.org/wikipedia/commons/d/d1/15th-century_unknown_painters_-_Five_Famous_Men_%28detail%29_-_WGA23920.jpg";
  }
  elseif($idartista == 13){
    $artista_imagen = "https://upload.wikimedia.org/wikipedia/commons/c/c6/David_Self_Portrait.jpg";
  }
  elseif($idartista == 14){
    $artista_imagen = "https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/Duquesnoy1776.jpg/220px-Duquesnoy1776.jpg";
  }
  elseif($idartista == 15){
    $artista_imagen = "";
  }
  elseif($idartista == 16){
    $artista_imagen = "https://canalhistoria.es/wp-content/uploads/2018/10/da_vinci_thumb.jpg";
  }
  elseif($idartista == 17){
    $artista_imagen = "https://mymodernmet.com/wp/wp-content/uploads/2019/04/michelangelo-facts-7.jpg";
  }
  elseif($idartista == 18){
    $artista_imagen = "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f6/Raffaello_Sanzio.jpg/1200px-Raffaello_Sanzio.jpg";
  }
  elseif($idartista == 19){
    $artista_imagen = "https://upload.wikimedia.org/wikipedia/commons/d/d4/Sandro_Botticelli_083.jpg";
  }

  #Se construye la consulta como un string
  $query1 = "SELECT DISTINCT * FROM artistas where idartista = $idartista;";
  $result1 = $db -> prepare($query1);
	$result1 -> execute();
  $artista = $result1 -> fetchAll();

  $query2 = "SELECT DISTINCT artistasfallecidos.fechafallecimiento FROM artistas, artistasfallecidos where artistas.idartista = artistasfallecidos.idartista and artistas.idartista = $idartista;";
  $result2 = $db -> prepare($query2);
	$result2 -> execute();
  $artista2 = $result2 -> fetchAll();

  $query3 = "SELECT DISTINCT obras.idobra, nombreobra from obrasartistas, obras where obras.idobra = obrasartistas.idobra and  idartista = $idartista;";
  $result3 = $db -> prepare($query3);
	$result3 -> execute();
  $obras = $result3 -> fetchAll();

  $muerte = "-";

  foreach($artista2 as $a){
    $muerte = "$a[0]";
  }

  foreach ($artista as $p ) {

    $nombre_artista = $p[1];

  }

  ?>



<br>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
     <h3 class="display-4"><?php echo $nombre_artista;?></h3>
     <h3 class="display-4"><?php echo $idartista;?></h3>
     <img src= "<?php echo $artista_imagen;?>" height="200" width="200";>
    </div>


    <div class="container">
      <table class="table table-striped table-bordered" style="width:60%; margin:auto">
        <tr>
          <th>Nombre</th>
          <th>Nacimiento</th>
          <th>Muerte</th>
          <th>Descripción</th>
        </tr>
        <?php
        foreach ($artista as $a) {
          echo "<tr> <td>$a[1]</td> <td>$a[2]</td> <td>$muerte</td> <td>$a[3]</td> </tr>";
        }
        ?>
      </table>
    </div>


<br>


<div class="container">
  <table class="table table-striped table-bordered" style="width:60%; margin:auto">
    <tr>
      <th>Nombre obra</th>
    </tr>
    <?php foreach ($obras as $a): ?>
      <tr> <td><?php echo "$a[1]  "?></td> <td>
            <form  align="center" action="obra_especificae3.php" method="post">
            <input type="hidden" name="username" value= "<?php echo $post_username;?>">
            <input type=hidden name="artista" value=<?php echo "$idartista"?>>
        <button type="submit" name="obra" value= <?php echo "$a[0]"?> class="btn btn-dark "> Conocer más de <?php echo "$a[1]"?> </button>
            </form>
      </td> </tr>
    <?php endforeach;?>
  </table>
</div>


<form align="center" action="artistase3.php" method="post">
    <br/>
    <br/>
    <input type="hidden" name="username" value= "<?php echo $post_username;?>">
    <button type="submit" class="btn btn-dark">
        Ver artistas
    </button>
  </form>


  <form action ="../test.php" method="POST">
        <br>
        <input type="hidden" name="username" value= "<?php echo $post_username;?>">
        <button type="submit" class="btn btn-dark ">
            Volver
        </button>
  </form>

    </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="../css/bootstrap.js"></script>
</body>
</html>
