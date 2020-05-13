<?php
include_once 'user_session.php';

$user_session = new userSession();
$user_session->closeSesion();

header('location: ../test.php')

?>