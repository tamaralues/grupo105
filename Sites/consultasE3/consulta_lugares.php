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


<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../configuracion/conexion.php");

  $idlugar = (int)($_POST["idlugar"]);
  echo "$idlugar";

	#Hacer consulta 1

 	$query = "SELECT DISTINCT lugares.nombrelugar, ciudades.nombreciudad, paises.nombrepais from lugares, ciudades, paises where lugares.idciudad = ciudades.idciudad and ciudades.idpais = paises.idpais and idlugar = $idlugar;";
	$result = $db -> prepare($query);
	$result -> execute();
  $lugares = $result -> fetchAll();

  $query2 = "SELECT DISTINCT precio, horaapertura, horacierre from museos where idlugar = $idlugar;";
	$result2 = $db -> prepare($query2);
	$result2 -> execute();
  $lugares2 = $result2 -> fetchAll();

  $query3 = "SELECT DISTINCT horaapertura, horacierre from iglesias where idlugar = $idlugar;";
	$result3 = $db -> prepare($query3);
	$result3 -> execute();
  $lugares3 = $result3 -> fetchAll();

  $query4 = "SELECT DISTINCT nombreobra, anoinicio, anotermino, idobra from obras where idlugar = $idlugar;";
	$result4 = $db -> prepare($query4);
	$result4 -> execute();
  $obras = $result4 -> fetchAll();

  $query_artistas = "SELECT DISTINCT nombreartista, artistas.idartista, nombrelugar from artistas, obrasartistas, obras where  obrasartistas.idartista = artistas.idartista and obrasartistas.idobra = obras.idobra and obras.idlugar = $idlugar;";
	$result_artistas  = $db -> prepare($query_artistas );
	$result_artistas  -> execute();
  $artistas = $result_artistas -> fetchAll();

  foreach ($lugares as $p ) {
    $nombre_lugar = $p[0];
  }

  if($idlugar == 1){
    $lugar_imagen = "https://upload.wikimedia.org/wikipedia/commons/0/00/Andrea_Mantegna_049_detail_possible_self-portrait.jpg";
  }
  elseif($idlugar == 2){
    $lugar_imagen = "https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Sistina-interno.jpg/540px-Sistina-interno.jpg";
  }
  elseif($idlugar == 3){
    $lugar_imagen = "https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/Nancy_Musee_des_Beaux-Arts_BW_2015-07-18_13-55-20.jpg/550px-Nancy_Musee_des_Beaux-Arts_BW_2015-07-18_13-55-20.jpg";
  }
  elseif($idlugar == 4){
    $lugar_imagen = "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5d/Galleria_borghese_facade.jpg/550px-Galleria_borghese_facade.jpg";
  }
  elseif($idlugar== 5){
    $lugar_imagen = "https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/Florence%2C_Italy_Uffizi_Museum_-_panoramio_%285%29.jpg/550px-Florence%2C_Italy_Uffizi_Museum_-_panoramio_%285%29.jpg";
  }
  elseif($idlugar == 6){
    $lugar_imagen = "https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/Dresden-Zwinger-Courtyard.11.JPG/550px-Dresden-Zwinger-Courtyard.11.JPG";
  }
  elseif($idlugar == 7){
    $lugar_imagen = "https://www.viajarflorencia.com/wp-content/uploads/interior-academia.jpg";
  }
  elseif($idlugar== 8){
    $lugar_imagen = "https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Santa_Maria_della_Vittoria_in_Rome_-_Front.jpg/842px-Santa_Maria_della_Vittoria_in_Rome_-_Front.jpg";
  }
  elseif($idlugar == 9){
    $lugar_imagen = "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Basilica_di_San_Pietro_in_Vaticano_September_2015-1a.jpg/540px-Basilica_di_San_Pietro_in_Vaticano_September_2015-1a.jpg";
  }
  elseif($idlugar == 10){
    $lugar_imagen = "https://upload.wikimedia.org/wikipedia/commons/thumb/7/76/Chateau_de_Chantilly_garden.jpg/550px-Chateau_de_Chantilly_garden.jpg";
  }
  elseif($idlugar == 11){
    $lugar_imagen = "https://upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Broodhuis_Bruxelles.jpg/600px-Broodhuis_Bruxelles.jpg";
  }
  elseif($idlugar == 12){
    $lugar_imagen= "https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/Nuovo_museo_dell%27opera_del_duomo%2C_facciatone_arnolfiano_di_santa_maria_del_fiore%2C_000.jpg/400px-Nuovo_museo_dell%27opera_del_duomo%2C_facciatone_arnolfiano_di_santa_maria_del_fiore%2C_000.jpg";
  }
  elseif($idlugar == 13){
    $lugar_imagen = "https://www.duna.cl/media/2020/03/5be46ffe35d80.jpeg";
  }
  elseif($idlugar == 14){
    $lugar_imagen = "https://upload.wikimedia.org/wikipedia/commons/thumb/b/bd/Rome_Vatican_Museums.jpg/550px-Rome_Vatican_Museums.jpg";
  }
  elseif($idlugar == 15){
    $lugar_imagen = "https://www.romando.org/wp-content/uploads/2018/06/plaza-navona.jpeg";
  }
  elseif($idlugar== 16){
    $lugar_imagen= "https://upload.wikimedia.org/wikipedia/commons/8/87/Piazza_San_Pietro%2C_Citta_del_Vaticano.jpg";
  }
  elseif($idlugar == 17){
    $lugar_imagen = "http://media.tuescapada.eu/xtras/2017/03/08140246/piazza-della-minerva-y-panteon-roma_tuescapada-eu.jpg?auto=compress&fit=scale&fm=pjpg&h=382&ixlib=php-1.2.1&q=30&w=740&wpsize=large";
  }
  elseif($idlugar == 18){
    $lugar_imagen = "https://mimundoviajero.files.wordpress.com/2014/04/amberes4_editado.jpg";
  }
  elseif($idlugar == 19){
    $lugar_imagen = "https://www.artforum.com/uploads/upload.002/id13146/article00_810x.jpg";
  }
  elseif($idlugar == 20){
    $lugar_imagen = "https://3.bp.blogspot.com/-IWh92cEyH4Q/VMAATaWqC6I/AAAAAAAAVx4/hHVUa5UAyo8/s1600/01.JPG";
  }
  elseif($idlugar == 22){
    $lugar_imagen = "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/View_of_Santa_Maria_del_Fiore_in_Florence.jpg/600px-View_of_Santa_Maria_del_Fiore_in_Florence.jpg";
  }
  elseif($idlugar == 21){
    $lugar_imagen = "https://blog-italia.com/wp-content/uploads/2009/11/santamaria_italia.jpg";
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

  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h3 class="display-4"><?php echo $nombre_lugar;?></h3>
    <img src= "<?php echo $lugar_imagen;?>" height="200" width="200";>



      <?php
    if(!empty($lugares2)){
    	foreach($lugares2 as $a){
    		echo "<h5>Tipo: </h5><p>Museo</p>";
        echo "<h5>Precio: </h5><p>$a[0]</p>";
        echo "<h5>Hora apertura: </h5><p>$a[1]</p>";
        echo "<h5>Hora cierre: </h5><p>$a[2]</p>";
    	}
    }
    elseif(!empty($lugares3)){
    	foreach($lugares3 as $a){
        echo "<h5>Tipo: </h5><p>Iglesia</p>";
        echo "<h5>Hora apertura: </h5><p>$a[0]</p>";
        echo "<h5>Hora cierre: </h5><p>$a[1]</p>";

    	}
    }

    else{
      echo "<h5>Tipo: </h5><p>Plaza</p>";
    }
    ?>


   <table class="table table-striped table-bordered" style="width:60%; margin:auto">
     <tr>
       <th>Nombre lugar</th>
       <th>Ciudad</th>
       <th>País</th>
     </tr>
     <?php
   	foreach ($lugares as $a) {
     		echo "<tr> <td>$a[0]</td> <td>$a[1]</td> <td>$a[2]</td> </tr>";
   	}
     ?>
   </table>


<table class="table table-striped table-bordered" style="width:60%; margin:auto">
  <tr>
    <th>Nombre Obra</th>
    <th>Año inicio</th>
    <th>Año término</th>
  </tr>
  <?php foreach ($obras as $a): ?>
  		<tr> <td><?php echo "$a[0]"?></td> <td><?php echo "$a[1]"?></td> <td><?php echo "$a[2]"?></td> <td>
          <form  align="center" action="obra_especificae3.php" method="post">
            <input type="hidden" name="username" value= "<?php echo $post_username;?>">
            <button type="submit" name="obra" value= <?php echo "$a[3]"?> class="btn btn-dark">Ir a Obra</button>
          </form>
      </td> </tr>
  <?php endforeach;?>
</table>


  <br>

  <table class="table table-striped table-bordered" style="width:60%; margin:auto">
    <tr>
      <th>Nombre artista</th>
    </tr>

	<?php foreach ($artistas as $a): ?>
  		<tr> <td><?php echo "$a[0]"?></td>  <td>
          <form  align="center" action="artistas_especificoe3.php" method="post">
             <input type="hidden" name="username" value= "<?php echo $post_username;?>">
             <button type="submit" name="artista" value= <?php echo "$a[1]"?> class="btn btn-dark">Ir a Artista</button>
          </form>
      </td> </tr>
  <?php endforeach; ?>
  </table>


  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="../css/bootstrap.js"></script>
</body>
</html>
