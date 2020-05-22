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
$query_reservas = "SELECT nombrehotel, direccionhotel, fechainicio, fechatermino FROM usuarios NATURAL JOIN reservas NATURAL JOIN hoteles WHERE username='$user_query';";
$query_tickets = "SELECT asiento, fechacompra, fechaviaje, cid_origen, cid_destino FROM datos_viaje NATURAL JOIN tickets_comprados NATURAL JOIN usuarios WHERE username='$user_query';";

$result_reservas = $db -> prepare($query_reservas);
$result_reservas -> execute();
$fetch_reservas = $result_reservas -> fetchAll();

$result_tickets = $db -> prepare($query_tickets);
$result_tickets -> execute();
$fetch_tickets = $result_tickets -> fetchAll();
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
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active text-dark" id="alojamiento-tab" data-toggle="tab" href="#alojamiento" role="tab" aria-controls="alojamiento" aria-selected="true" style="text-decoration:none;">Reservas de Alojamiento</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" id="transporte-tab" data-toggle="tab" href="#transporte" role="tab" aria-controls="transporte" aria-selected="false">Tickets de Transporte</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" id="transporte-tab" data-toggle="tab" href="#transporte" role="tab" aria-controls="transporte" aria-selected="false">Visitas Museos</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="alojamiento" role="tabpanel" aria-labelledby="alojamiento-tab">
                <table class="table table-striped table-bordered" style="width:100%; margin:auto">
                    <tr><th>Nombre Hotel</th><th>Direccion Hotel</th><th>Fecha inicio</th><th>Fecha Termino</th></tr>
                    <?php
                    foreach($fetch_reservas as $f){
                        echo "<tr><td>$f[0]</td><td>$f[1]</td><td>$f[2]</td><td>$f[3]</td></tr>";
                    }
                    ?>
                </table>
            </div>
            <div class="tab-pane fade" id="transporte" role="tabpanel" aria-labelledby="transporte-tab">
                <table class="table table-striped table-bordered" style="width:90%; margin:auto">
                    <tr><th>Asiento</th><th>Fecha Compra</th><th>Fecha Viaje</th><th>Ciudad origen</th><th>Ciudad destino</th></tr>
                    <?php
                    foreach($fetch_tickets as $f){
                        $query_origen = "SELECT nombreciudad, cid from ciudades WHERE cid='$f[3]';";
                        $query_destino = "SELECT nombreciudad, cid from ciudades WHERE cid='$f[4]';";

                        $result_origen = $db -> prepare($query_origen);
                        $result_origen -> execute();
                        $fetch_origen = $result_origen -> fetchAll();

                        $result_destino = $db -> prepare($query_destino);
                        $result_destino -> execute();
                        $fetch_destino = $result_destino -> fetchAll();

                        foreach($fetch_origen as $fo){
                            $g=$fo[0];
                        }
                        foreach($fetch_destino as $fd){
                            $h=$fd[0];
                        }

                        echo "<tr><td>$f[0]</td><td>$f[1]</td><td>$f[2]</td><td>$g</td><td>$h</td></tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="../css/bootstrap.js"></script>
</body>
</html>
