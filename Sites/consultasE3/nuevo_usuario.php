<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../configuracion/conexion_db_stored2.php");

  #Se obtiene el valor del input del usuario
  $altura = $_POST["altura"];
  $altura = intval($altura);

  #Se construye la consulta como un string
 	$query = "SELECT uid, username, correo, password FROM usuarios order by uid desc;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$pokemones = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>UID</th>
      <th>Username</th>
      <th>correo</th>
      <th>password</th>
    </tr>
  
      <?php
        $last_uid = 0;
        foreach ($pokemones as $p) {
          echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td><td>$p[3]</td></tr>";
          if ($last_uid < $p[0]){
            $last_uid=$p[0];
          }
      }
      $last_uid +=1;
      ?>

      
  </table>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../configuracion/conexion_db_stored2.php");

  #Se obtiene el valor del input del usuario
  $usuario = $_POST["usuario"];
  $correo = $_POST["correo"];
  $pwd = $_POST["pwd"];

  #Se construye la consulta como un string
     $query_usuario = "INSERT INTO usuarios(uid, username, correo, password) VALUES ($last_uid, $usuario, $correo, $pwd);";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result_usuario = $db -> prepare($query_usuario);
    $result_usuario -> execute();
    $catch_usuario = $result -> fetchAll();
?>
<p> por insertar </p>
<table>
    <tr>
      <th>UID</th>
      <th>Usernmae</th>
      <th>correo</th>
      <th>password</th>
    </tr>
  
<?php
    echo "<tr><td>$last_uid</td><td>$usuario</td><td>$correo</td><td>$pwd</td></tr>";
?>
</table>
<?php
    echo (string) $result_usuario;
?>
</body>