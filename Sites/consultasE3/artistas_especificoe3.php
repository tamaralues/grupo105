<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

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
  ?>

<br>

<table>
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

<br>
<table>
    <tr>
      <th>Nombre obra</th>
    </tr>

<?php foreach ($obras as $a): ?>
  <tr> <td><?php echo "$a[1]"?></td> <td>
        <form  align="left" action="obra_especifica.php" method="post">
        <input type=hidden name="artista" value=<?php echo "$idartista"?>>
    <button type="submit" name="obra" value= <?php echo "$a[0]"?> class="btn-link">Ir a Obra</button>
        </form>
  </td> </tr>
<?php endforeach;?>
</table>

<img src= "<?php echo $artista_imagen;?>" height="200" width="200";>


<form align="center" action="artistas.php" method="post">
    <br/>
    <br/>
    <input type="submit" value="Artistas">
  </form>
