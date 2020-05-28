
<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../configuracion/conexion.php");

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
