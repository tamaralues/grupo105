<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../configuracion/conexion_db.php");

  #Se obtiene el valor del input del usuario
  $usuario = $_POST["usuario"];
  $correo = $_POST["correo"];
  $pwd = $_POST["pwd"];

  #Se construye la consulta como un string
 	$query = "SELECT id, nombre, altura FROM ejercicio_ayudantia where altura>=$altura order by altura desc;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$pokemones = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Altura</th>
    </tr>
  
      <?php
        foreach ($pokemones as $p) {
          echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td></tr>";
      }
      ?>
      
  </table>
</body>