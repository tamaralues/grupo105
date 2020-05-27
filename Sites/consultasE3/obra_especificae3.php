
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

  $idobra = (int)($_POST["obra"]);
  $artista_prev = (int)($_POST["artista"]);

	#Hacer consulta 2
 	$query = "SELECT DISTINCT obras.idobra, obras.nombreobra, obras.anoinicio, obras.anotermino, obras.periodo, obras.idlugar, lugares.nombrelugar, ciudades.nombreciudad, paises.nombrepais from artistas, obrasartistas, obras,
   lugares, ciudades, paises  where  artistas.idartista = obrasartistas.idartista and obrasartistas.idobra = obras.idobra and obras.idlugar = lugares.idlugar and lugares.idciudad = ciudades.idciudad and ciudades.idpais = paises.idpais and obras.idobra = $idobra;";
	$result = $db -> prepare($query);
	$result -> execute();
	$obras = $result -> fetchAll();

	$query2 = "SELECT DISTINCT tecnica from pinturas where idobra = $idobra;";

	$result2 = $db -> prepare($query2);
	$result2 -> execute();
	$obras2 = $result2 -> fetchAll();

	$query3 = "SELECT DISTINCT material from esculturas where idobra = $idobra;";
	$result3 = $db -> prepare($query3);
	$result3 -> execute();
	$obras3 = $result3 -> fetchAll();


  if($idobra == 0){
    $obra_imagen = "https://historiascortas.org/wp-content/uploads/2019/08/A-Apolo-siguiendo-a-Dafne-Historias-Cortas.jpg";
  }
  elseif($idobra == 1){
    $obra_imagen = "https://historiascortas.org/wp-content/uploads/2019/08/A-Apolo-siguiendo-a-Dafne-Historias-Cortas.jpg";
  }
  elseif($idobra == 2){
    $obra_imagen = "https://upload.wikimedia.org/wikipedia/commons/0/0b/Sandro_Botticelli_-_La_nascita_di_Venere_-_Google_Art_Project_-_edited.jpg";
  }
  elseif($idobra == 3){
    $obra_imagen = "https://3minutosdearte.com/wp-content/uploads/2018/06/Caravaggio-Cabeza-de-Medusa-1597-e1536759112183.jpg";
  }
  elseif($idobra == 4){
    $obra_imagen = "https://historia-arte.com/_/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpbSI6WyJcL2FydGlzdFwvaW1hZ2VGaWxlXC9iaWxkLW90dGF2aW9fbGVvbmlfY2FyYXZhZ2dpby5qcGciLCJyZXNpemVDcm9wLDQwMCw0MDAsQ1JPUF9FTlRST1BZIl19.1jyWicmcmhjD2HUyZ71ftRHCfe8b7Y/uWLJ-vx_w-Qvk.jpg";
  }
  elseif($idobra == 5){
    $obra_imagen = "https://3minutosdearte.com/wp-content/uploads/2018/06/Caravaggio-Cabeza-de-Medusa-1597-e1536759112183.jpg";
  }
  elseif($idobra == 6){
    $obra_imagen = "https://upload.wikimedia.org/wikipedia/commons/thumb/2/25/Sandro_Botticelli_-_La_Primavera_-_Google_Art_Project.jpg/1920px-Sandro_Botticelli_-_La_Primavera_-_Google_Art_Project.jpg";
  }
  elseif($idobra == 7){
    $obra_imagen = "https://upload.wikimedia.org/wikipedia/commons/0/0b/Fede_Galizia_-_Portrait_of_Federico_Zuccari_-_WGA8432.jpg";
  }
  elseif($idobra == 8){
    $obra_imagen = "";
  }
  elseif($idobra == 9){
    $obra_imagen = "https://1.bp.blogspot.com/--KIKtapkO3w/WhmboHFDGqI/AAAAAAABBWQ/-ipO8dWN0e4t2bsjne6ft7t6uISXgZvDQCLcBGAs/s1600/01.jpeg";
  }
  elseif($idobra== 10){
    $obra_imagen = "https://www.biografiasyvidas.com/biografia/b/fotos/bernini.jpg";
  }
  elseif($idobra == 11){
    $obra_imagen = "https://www.descubrirelarte.es/wp-content/uploads/2019/12/DETALLE-RETRATO-VASARI.jpg";
  }
  elseif($idobra == 12){
    $obra_imagen = "https://upload.wikimedia.org/wikipedia/commons/d/d1/15th-century_unknown_painters_-_Five_Famous_Men_%28detail%29_-_WGA23920.jpg";
  }
  elseif($idobra == 13){
    $obra_imagen = "https://upload.wikimedia.org/wikipedia/commons/c/c6/David_Self_Portrait.jpg";
  }
  elseif($idobra == 14){
    $obra_imagen = "https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/Duquesnoy1776.jpg/220px-Duquesnoy1776.jpg";
  }
  elseif($idobra == 15){
    $obra_imagen = "";
  }
  elseif($idobra == 16){
    $obra_imagen = "https://canalhistoria.es/wp-content/uploads/2018/10/da_vinci_thumb.jpg";
  }
  elseif($idobra == 17){
    $obra_imagen = "https://mymodernmet.com/wp/wp-content/uploads/2019/04/michelangelo-facts-7.jpg";
  }
  elseif($idobra == 18){
    $obra_imagen = "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f6/Raffaello_Sanzio.jpg/1200px-Raffaello_Sanzio.jpg";
  }
  elseif($idobra == 19){
    $obra_imagen = "https://upload.wikimedia.org/wikipedia/commons/d/d4/Sandro_Botticelli_083.jpg";
  }
  elseif($idobra == 20){
    $obra_imagen = "https://upload.wikimedia.org/wikipedia/commons/d/d4/Sandro_Botticelli_083.jpg";
  }
  elseif($idobra == 21){
    $obra_imagen = "https://upload.wikimedia.org/wikipedia/commons/d/d4/Sandro_Botticelli_083.jpg";
  }
  elseif($idobra == 22){
    $obra_imagen = "https://upload.wikimedia.org/wikipedia/commons/d/d4/Sandro_Botticelli_083.jpg";
  }
  elseif($idobra == 23){
    $obra_imagen = "https://upload.wikimedia.org/wikipedia/commons/d/d4/Sandro_Botticelli_083.jpg";
  }
  elseif($idobra == 24){
    $obra_imagen = "https://upload.wikimedia.org/wikipedia/commons/d/d4/Sandro_Botticelli_083.jpg";
  }
  elseif($idobra == 25){
    $obra_imagen = "https://upload.wikimedia.org/wikipedia/commons/d/d4/Sandro_Botticelli_083.jpg";
  }
  elseif($idobra == 26){
    $obra_imagen = "https://upload.wikimedia.org/wikipedia/commons/d/d4/Sandro_Botticelli_083.jpg";
  }
  elseif($idobra == 27){
    $obra_imagen = "https://upload.wikimedia.org/wikipedia/commons/d/d4/Sandro_Botticelli_083.jpg";
  }
  elseif($idobra == 28){
    $obra_imagen = "https://upload.wikimedia.org/wikipedia/commons/d/d4/Sandro_Botticelli_083.jpg";
  }
  elseif($idobra == 29){
    $obra_imagen = "https://upload.wikimedia.org/wikipedia/commons/d/d4/Sandro_Botticelli_083.jpg";
  }
  elseif($idobra == 30){
    $obra_imagen = "https://upload.wikimedia.org/wikipedia/commons/d/d4/Sandro_Botticelli_083.jpg";
  }
  elseif($idobra == 31){
    $obra_imagen = "https://upload.wikimedia.org/wikipedia/commons/d/d4/Sandro_Botticelli_083.jpg";
  }
  elseif($idobra == 32){
    $obra_imagen = "https://upload.wikimedia.org/wikipedia/commons/d/d4/Sandro_Botticelli_083.jpg";
  }
  elseif($idobra == 33){
    $obra_imagen = "https://photo620x400.mnstatic.com/96ed0ddc23455feb41e8e7f55b599bf0/manneken-pis.jpg";
  }
  elseif($idobra == 34){
    $obra_imagen = "https://upload.wikimedia.org/wikipedia/commons/f/f2/Jos%C3%A9_de_Ribera_024.jpg";
  }
  elseif($idobra == 35){
    // No encontré
    $obra_imagen = "";
  }
  elseif($idobra == 36){
    $obra_imagen = "https://upload.wikimedia.org/wikipedia/commons/1/14/Pulcin_della_Minerva_2006_n2.jpg";
  }
  elseif($idobra == 37){
    $obra_imagen = "http://oer2go.org/mods/es-wikipedia-static/content/i/m/piazza_san_pietro2010_01.jpg";
  }
  elseif($idobra == 38){
    $obra_imagen = "https://cdn.shopify.com/s/files/1/0347/0612/9031/products/Tondo_Taddei_CastMarble_540x.png?v=1583697210";
  }
  elseif($idobra == 39){
    $obra_imagen = "https://static2.abc.es/media/cultura/2015/11/27/extasis--620x349.jpg";
  }


  foreach ($obras as $p ) {
    $nombre_obra = $p[1];
  }

  ?>

   <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h3 class="display-4"><?php echo $nombre_obra;?></h3>
    <img src= "<?php echo $obra_imagen;?>" height="200" width="200";>
    <?php
    if(!empty($obras2)){
    	foreach($obras2 as $a){
    		echo "<h5>Tipo:</h5> <p>Pintura</p>";
    		echo "<h5>Técnica:</h5> <p>$a[0]</p>";
    	}
    }
    elseif(!empty($obras3)){
    	foreach($obras3 as $a){
    		echo "<h5>Tipo:</h5> <p>Escultura</p>";
    		echo "<h5>Material:</h5> <p> $a[0]</p>";

    	}
    }

    else{
    	echo "<h5>Tipo:</h5> <p> Fresco</p>";
    }
    ?>
   </div>

    <table class="table table-striped table-bordered" style="width:60%; margin:auto">
      <tr>
        <th>Nombre</th>
    	  <th>Inicio</th>
    	  <th>Término</th>
    	  <th>Periodo</th>
    	  <th>Lugar</th>
    	  <th>Ciudad</th>
    	  <th>Pais</th>
      </tr>
      <?php
    	foreach ($obras as $a) {
    		$idlugar = $a[5];
      		echo "<tr> <td>$a[1]</td> <td>$a[2]</td> <td>$a[3]</td> <td>$a[4]</td> <td>$a[6]</td>  <td>$a[7]</td> <td>$a[8]</td> </tr>";
    	}
      ?>
    </table>
    <form  align="center" action="consulta_lugares.php" method="post">
        <button type="submit" name="idlugar" value= <?php echo "$idlugar"?> class="btn btn-dark">Ir a Lugar</button>
    </form>
    <br>
    <form  align="center" action="artistas_especificoe3.php" method="post">
        <button type="submit" name="artista" value= <?php echo "$artista_prev"?> class="btn btn-dark">Ir a Artista</button>

    </form>

  </div>




</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="../css/bootstrap.js"></script>
</body>
</html>
