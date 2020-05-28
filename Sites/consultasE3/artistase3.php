
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  require("../configuracion/conexion.php");


	#Hacer consulta 1

 	$query = "SELECT DISTINCT idartista, nombreartista from artistas;";
	$result = $db -> prepare($query);
	$result -> execute();
  $artista = $result -> fetchAll();


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

<div class="pricing-header px-3 py-100 pt-md-5 pb-md-4 mx-auto text-center">
  <h3 class="display-4"> Listado artistas</h3>

	<table class="table table-striped table-bordered" style="width:60%; margin:auto">
    <tr>
    <th>Nombre </th>
    </tr>

	<?php foreach ($artista as $a): ?>
  		<tr> <td><?php echo "$a[1]"?></td> <td>
         <form  align="left" action="artistas_especificoe3.php" method="post">
    <button type="submit" name="artista" value= <?php echo "$a[0]"?> class="btn btn-dark">Ir a Artista</button>
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
