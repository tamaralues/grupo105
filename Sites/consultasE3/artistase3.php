
<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  require("../configuracion/conexion.php");


	#Hacer consulta 1

 	$query = "SELECT DISTINCT idartista, nombreartista from artistas;";
	$result = $db -> prepare($query);
	$result -> execute();
  $artista = $result -> fetchAll();


  ?>

	<table>
    <tr>
    <th>Nombre </th>
    </tr>

	<?php foreach ($artista as $a): ?>
  		<tr> <td><?php echo "$a[1]"?></td> <td>
         <form  align="left" action="artistas_especificoe3.php" method="post">
    <button type="submit" name="artista" value= <?php echo "$a[0]"?> class="btn-link">Ir a Artista</button>
        </form>
</td> </tr>
  <?php endforeach; ?>

	</table>
