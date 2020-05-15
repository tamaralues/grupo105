<?php
    require("../configuracion/conexion_db_e3.php");
    $fechainicio = $_POST["fechainicio"];
    $fechatermino = $_POST["fechatermino"];
    session_start();
    $user = $_SESSION['user'];
    $uid = $_SESSION['uid'];
?>

<?php echo "<p>$user</p>"; ?>
<?php echo "<p>$uid</p>"; ?>
<?php echo "<p>$fechainicio</p>"; ?>
<?php echo "<p>$fechatermino</p>"; ?>
