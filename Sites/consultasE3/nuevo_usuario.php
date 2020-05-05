<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../configuracion/conexion_db_stored2.php");

  #Se obtiene el valor del input del usuario
  $usuario = $_POST["usuario"];
  $correo = $_POST["correo"];
  $pwd = $_POST["pwd"];

  #Se construye la consulta como un string
     $query_usuario = "SELECT anadir_usuario($usuario, $correo, $pwd);";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result_usuario = $db -> prepare($query_usuario);
	$result_usuario -> execute();
    $usuario_repetido = $result -> fetchAll();
    
?>
</body>