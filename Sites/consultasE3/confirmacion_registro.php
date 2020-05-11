<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../configuracion/conexion_db_stored2.php");

  #Se obtiene el valor del input del usuario
  $name = $_POST["name"];
  $direccion = $_POST["direccion"];
  $user = $_POST["user"];
  $correo = $_POST["correo"];
  $pwd = $_POST["pwd"];

 #Consulta para saber si existe el usuario/correo, y cual UID correspondería
 $query_uid = "SELECT uid, username, correo, password, nombreusuario, direccionusuario FROM usuarios NATURAL JOIN cuentas order by uid desc;";

 #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
   $result_uid = $db -> prepare($query);
   $result_uid -> execute();
   $fetch_uid = $result_uid -> fetchAll();

   $last_uid = 0;
   $correo = FALSE;
   $username = FALSE;
   foreach ($fetch_uid as $p) {
     if ($last_uid < $p[0]){
       $last_uid=$p[0];
     }
     if ($p[1] == $user){
         $username = TRUE;
         echo "usuario ocupado";
     }
     if ($p[2] == $correo) {
         $correo = TRUE;
         echo "correo ocupado";
     }
 }
 #id del usuario que se debe añadir
 $last_uid +=1;
if ($username && $correo) {
  #Se construye la consulta como un string
    $query_usuario = "INSERT INTO usuarios(uid, username, correo, password) VALUES ('$last_uid', '$usuario', '$correo', '$pwd');";
    $query_cuentas = "INSERT INTO cuentas(nombreusuario, username, direccionusuario) VALUES ('$nombre', '$usuario', '$direccion');";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result_usuario = $db -> prepare($query_usuario);
    $bool_usuario = $result_usuario -> execute();
    
    $result_cuentas = $db -> prepare($query_cuentas);
    $bool_cuentas = $result_cuentas -> execute();
}

?>
<p> insertando </p>
<table>
    <tr>
      <th>UID</th>
      <th>Username</th>
      <th>Nombre y apellido</th>
      <th>correo</th>
      <th>Direccion</th>
      <th>password</th>
    </tr>
  
<?php
    echo "<tr><td>$last_uid</td><td>$user</td><td>$name</td><td>$direccion</td><td>$correo</td><td>$pwd</td></tr>";
?>
</table>
<?php
    if ($bool_usuario==True){
        echo "usuario: True";
    }
    else {
        echo "usuario: False";
    }
    if ($bool_cuentas==True){
        echo "cuentas: True";
    }
    else {
        echo "cuentas: False";
    }
?>
</body>