<?php

session_start();

require("../configuracion/conexion_db_e3.php");

 #inicio de sesion

$user1 = $_SESSION['username'];
$uid2 = $_SESSION['id'];
?>

<?php echo "<p>$user1</p>"; ?>
<?php echo "<p>$uid2</p>"; ?>
