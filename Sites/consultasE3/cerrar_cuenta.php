<?php
include_once '../include/user_session.php';
include_once '../configuracion/conexion_db_e3.php';

$user_session = new userSession();
$user_session->closeSesion();

$username = $_POST['username'];


header('location: ../test.php')

?>