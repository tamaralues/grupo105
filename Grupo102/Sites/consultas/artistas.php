<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
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
         <form  align="left" action="artista_especifico.php" method="post">
    <button type="submit" name="artista" value= <?php echo "$a[0]"?> class="btn-link">Ir a Artista</button>
        </form> 
</td> </tr>
  <?php endforeach; ?>

	</table>

<?php include('../templates/footer.html'); ?>
