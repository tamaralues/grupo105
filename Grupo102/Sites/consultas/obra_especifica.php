<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $idobra = (int)($_POST["obra"]);
  $artista_prev = (int)($_POST["artista"]);

	#Hacer consulta 2
 	$query = "SELECT DISTINCT obras.idobra, obras.nombreobra, obras.anoinicio, obras.anotermino, obras.periodo, obras.idlugar, lugares.nombrelugar, ciudades.nombreciudad, paises.nombrepais from artistas, obrasartistas, obras, lugares, ciudades, paises  where  artistas.idartista = obrasartistas.idartista and obrasartistas.idobra = obras.idobra and obras.idlugar = lugares.idlugar and lugares.idciudad = ciudades.idciudad and ciudades.idpais = paises.idpais and obras.idobra = $idobra;";
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

  ?>

	<table>
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

<?php
if(!empty($obras2)){
	foreach($obras2 as $a){
		echo "<p align=left>Tipo: Pintura</p>";
		echo "<p align=left>Técnica: $a[0]</p>";
	}
}
elseif(!empty($obras3)){
	foreach($obras3 as $a){
		echo "<p align=left>Tipo: Escultura</p>";
		echo "<p align=left> Material: $a[0]</p>";

	}
}

else{
	echo "<p align=left>Tipo: Fresco</p>";
}
?>

<form  align="left" action="lugar_especifico.php" method="post">
    <button type="submit" name="idlugar" value= <?php echo "$idlugar"?> class="btn-link">Ir a Lugar</button>
</form>
<br>
<form  align="left" action="artista_especifico.php" method="post">
    <button type="submit" name="artista" value= <?php echo "$artista_prev"?> class="btn-link">Ir a Artista</button>
</form>

</body>
<?php include('../templates/footer.html'); ?>
