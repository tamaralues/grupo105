<?php
require("configuracion/conexion_db_e3.php");
include_once 'include/user.php';
include_once 'include/user_session.php';

$user_session = new userSession();
$user = new User($db);

$post_username = $_POST['username'];

$user_session -> setCurrentUser($post_username);
$user -> setUser($post_username);

if (isset($_SESSION['user'])){
    echo "<p>hay sesion iniciada</p>";
} else {
    echo "<p>hay que logear</p>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../css/bootstrapE3.css" rel="stylesheet">
    <link href="../css/estiloE3.css" rel="stylesheet">
    <title>Mi Perfil</title>
</head>

<body>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="../css/bootstrap.js"></script>
</body>
</html>
