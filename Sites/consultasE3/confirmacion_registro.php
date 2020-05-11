<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../configuracion/conexion_db_e3.php");

  #Se obtiene el valor del input del usuario
  $name = $_POST["name"];
  $direccion = $_POST["direccion"];
  $user = $_POST["user"];
  $correo = $_POST["correo"];
  $pwd = $_POST["pwd"];

 #Consulta para saber si existe el usuario/correo, y cual UID correspondería
 $query_uid = "SELECT uid, username, correo, password, nombreusuario, direccionusuario FROM usuarios NATURAL JOIN cuentas order by uid desc;";

 #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
   $result_uid = $db -> prepare($query_uid);
   $result_uid -> execute();
   $fetch_uid = $result_uid -> fetchAll();

   $last_uid = 0;
   $bool_correo = FALSE;
   $bool_username = FALSE;
   foreach ($fetch_uid as $p) {
     if ($last_uid < $p[0]){
       $last_uid=$p[0];
     }
     if ($p[1] == $user){
         $bool_username = TRUE;
     }
     if ($p[2] == $correo) {
         $bool_correo = TRUE;
     }
 }
 #id del usuario que se debe añadir
 $last_uid +=1;
if (!$bool_username && !$bool_correo) {
   // echo "ejecutando inserciones";
  #Se construye la consulta como un string
    $query_usuario = "INSERT INTO usuarios(uid, username, correo, password) VALUES ('$last_uid', '$user', '$correo', '$pwd');";
    $query_cuentas = "INSERT INTO cuentas(nombreusuario, username, direccionusuario) VALUES ('$name', '$user', '$direccion');";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result_usuario = $db -> prepare($query_usuario);
    $bool_usuario = $result_usuario -> execute();
    
    $result_cuentas = $db -> prepare($query_cuentas);
    $bool_cuentas = $result_cuentas -> execute();
}

?><!--
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
-->
  
<?php
    // echo "<tr><td>$last_uid</td><td>$user</td><td>$name</td><td>$correo</td><td>$direccion</td><td>$pwd</td></tr>";
?>
</table>
<?php
     /* por si quiero revisar lo que se esta ingresando
    if ($bool_username==True){
        echo "usuario_repetido: True";
    }
    else {
        echo "usuario_repetido: False";
    }
    echo "\n";
    if ($bool_correo==True){
        echo "correo_repetido: True";
    }
    else {
        echo "correo_repetido: False";
    }
    echo "\n";
    if ($bool_cuentas==True){
        echo "bool_cuentas: True";
    }
    else {
        echo "bool_cuentas: False";
    }
    if ($bool_usuario==True){
        echo "bool_usuarios: True";
    }
    else {
        echo "bool_usuarios: False";
    }
    */
    header("Location: ../test.php");
    die();
?>

</body>