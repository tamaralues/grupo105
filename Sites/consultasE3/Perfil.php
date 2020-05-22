<?php
require("../configuracion/conexion_db_e3.php");
include_once '../include/user.php';
include_once '../include/user_session.php';

$user_session = new userSession();
$user = new User($db);

$post_username = $_POST['username'];

if (isset($_SESSION['user'])){
    #echo "<p>hay sesion iniciada</p>";
    $user->setUser($user_session->getCurrentUser());}
else{
$user_session -> setCurrentUser($post_username);
$user -> setUser($post_username);
}

$user_query=$_SESSION['user'];

$query_museos ='';
$query_reservas ="SELECT nombrehotel, direccionhotel, fechainicio, fechatermino FROM usuarios NATURAL JOIN reservas NATURAL JOIN hoteles WHERE username='$user_query';";
$query_tickets = '';

$result_reservas = $db -> prepare($query_reservas);
$result_reservas -> execute();
$fetch_reservas = $result_reservas -> fetchAll();
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
    <?php
    $path_navbar ='../';
    include_once '../nav_bar.php';
    echo "<p>estamos en el perfil de {$_SESSION['user']}</p>";
    ?>
    

    <div class="container">
        <div class="card-deck mb-3 text-center">
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Reservas de Alojamiento</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <tr><th>Nombre Hotel</th><th>Direccion Hotel</th><th>Fecha inicio</th><th>Fecha Termino</th>
                        <?php
                        foreach($fetch_reservas as $f){
                            echo "<tr><td>$f[0]</td><td>$f[1]</td><td>$f[2]</td><td>$f[3]</td></tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Tickets de transporte</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>       
        </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="../css/bootstrap.js"></script>
</body>
</html>
