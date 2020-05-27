
<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
  $idlugar = (int)($_POST["idlugar"]);
  #echo "$idlugar";
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

  $query5 = "SELECT DISTINCT nombreartista, artistas.idartista from artistas, obrasartistas, obras where  obrasartistas.idartista = artistas.idartista and obrasartistas.idobra = obras.idobra and obras.idlugar = $idlugar;";
	$result5 = $db -> prepare($query5);
	$result5 -> execute();
  $artistas = $result5 -> fetchAll();

  ?>

	<table>
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

  <?php
if(!empty($lugares2)){
	foreach($lugares2 as $a){
		echo "<p align=left>Tipo: Museo</p>";
    echo "<p align=left>Precio: $a[0]</p>";
    echo "<p align=left>Hora Apertura: $a[1]</p>";
    echo "<p align=left>Hora Cierre: $a[2]</p>";
	}
}
elseif(!empty($lugares3)){
	foreach($lugares3 as $a){
		echo "<p align=left>Tipo: Iglesia</p>";
		echo "<p align=left>Hora Apertura: $a[0]</p>";
    echo "<p align=left>Hora Cierre: $a[1]</p>";

	}
}

else{
	echo "<p align=left>Tipo: Plaza</p>";
}
?>

<table>
    <tr>
	    <th>Nombre Obra</th>
      <th>Año inicio</th>
      <th>Año término</th>
    </tr>
	<?php foreach ($obras as $a): ?>
  		<tr> <td><?php echo "$a[0]"?></td> <td><?php echo "$a[1]"?></td> <td><?php echo "$a[2]"?></td> <td>
          <form  align="left" action="obra_especifica.php" method="post">
    <button type="submit" name="obra" value= <?php echo "$a[3]"?> class="btn-link">Ir a Obra</button>
          </form>
      </td> </tr>
  <?php endforeach;?>
  </table>
  <br>
  <table>
    <tr>
      <th>Nombre artista</th>
    </tr>

	<?php foreach ($artistas as $a): ?>
  		<tr> <td><?php echo "$a[0]"?></td>  <td>
          <form  align="left" action="artista_especifico.php" method="post">
    <button type="submit" name="artista" value= <?php echo "$a[1]"?> class="btn-link">Ir a Artista</button>
          </form>
      </td> </tr>
  <?php endforeach; ?>
  </table>
