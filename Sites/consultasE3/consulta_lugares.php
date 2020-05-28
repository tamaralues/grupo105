

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

  $query5 = "SELECT DISTINCT nombreartista, artistas.idartista, nombrelugar from artistas, obrasartistas, obras where  obrasartistas.idartista = artistas.idartista and obrasartistas.idobra = obras.idobra and obras.idlugar = $idlugar;";
	$result5 = $db -> prepare($query5);
	$result5 -> execute();
  $artistas = $result5 -> fetchAll();

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
    <th>Nombre Obra</th>
    <th>Año inicio</th>
    <th>Año término</th>
  </tr>
  <?php foreach ($obras as $a): ?>
  		<tr> <td><?php echo "$a[0]"?></td> <td><?php echo "$a[1]"?></td> <td><?php echo "$a[2]"?></td> <td>
          <form  align="center" action="obra_especificae3.php" method="post">
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
