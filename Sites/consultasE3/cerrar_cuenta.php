<?php
include_once '../include/user_session.php';
include_once '../configuracion/conexion_db_e3.php';

$user_session = new userSession();
$user_session->closeSesion();

$username = $_POST['username'];

$query = "UPDATE usuarios SET activos=FALSE WHERE username='$username'";

$result = $db -> prepare($query);
$result -> execute();

echo "<p>username: $username</p>";
#header('location: ../test.php')

?>