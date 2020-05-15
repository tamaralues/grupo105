<?php
    session_start();
    require("../configuracion/conexion_db_e3.php");

    $fechainicio = $_POST["fechainicio"];
    $fechatermino = $_POST["fechatermino"];

    $user = $_SESSION['username'];
    $uid = $_SESSION['id'];

?>

<?php echo "<p>$user</p>"; ?>
<?php echo "<p>$uid</p>"; ?>
<?php echo "<p>$fechainicio</p>"; ?>
<?php echo "<p>$fechatermino</p>"; ?>
