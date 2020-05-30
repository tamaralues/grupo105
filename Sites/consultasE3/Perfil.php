<?php
require("../configuracion/conexion_db_e3.php");

include_once '../include/user.php';
include_once '../include/user_session.php';

#mantener sesion iniciada
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

#consultas del perfil
$user_query=$_SESSION['user'];

$query_museos ='';
$query_reservas = "SELECT nombrehotel, direccionhotel, fechainicio, fechatermino FROM usuarios NATURAL JOIN reservas NATURAL JOIN hoteles WHERE username='$user_query';";
$query_tickets = "SELECT asiento, fechacompra, fechaviaje, cid_origen, cid_destino FROM datos_viaje NATURAL JOIN tickets_comprados NATURAL JOIN usuarios WHERE username='$user_query';";
$query_dinero_tickets ="SELECT precio, duracion FROM datos_viaje NATURAL JOIN tickets_comprados NATURAL JOIN usuarios WHERE username='$user_query';";

$result_reservas = $db -> prepare($query_reservas);
$result_reservas -> execute();
$fetch_reservas = $result_reservas -> fetchAll();

$result_tickets = $db -> prepare($query_tickets);
$result_tickets -> execute();
$fetch_tickets = $result_tickets -> fetchAll();

$result_dinero_tickets = $db -> prepare($query_dinero_tickets);
$result_dinero_tickets -> execute();
$fetch_dinero_tickets = $result_dinero_tickets -> fetchAll();

$dinero_gastado_tickets = 0;
$horas_viaje = 0;
foreach($fetch_dinero_tickets as $f){
    $dinero_gastado_tickets+=$f[0];
    $horas_viaje+=$f[1];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../css/bootstrapE3.css" rel="stylesheet">
    <link href="../css/styleE3_perfil.css" rel="stylesheet">
    <title>Mi Perfil</title>
</head>

<body>
    <?php
    $path_navbar ='../';
    include_once '../nav_bar.php';
    echo "<p>estamos en el perfil de {$_SESSION['user']}</p>";
    ?>


    <div class="container px-4 py-2" style="width:90%; margin-top: 67px;">
        <div class="row justify-content-start py-2">
            <div class="col-2">
                <img class="img-fluid d-block rounded" style="width: 100%;"
                src="https://s.ppy.sh/a/" />
            </div>
            <div class="col-6">
                <h3>Nombre de Usuario</h3>
                <div class="row justify-align-start">
                    <div class="col-8">
                        <p style="line-height: 10pt; font-size: 18px;">Dinero gastado en tickets:</p>
                        <p style="line-height: 10pt; font-size: 18px;">Tiempo utilizado en transportes:</p>
                        <p style="line-height: 10pt; font-size: 18px;">Numero de museos visitados:</p>
                    </div>
                    <div class="col-4">
                        <p style="line-height: 10pt; font-size: 18px;"><?php echo "$$dinero_gastado_tickets";?></p>
                        <p style="line-height: 10pt; font-size: 18px;"><?php echo "$horas_viaje Hrs.";?></p>
                        <p style="line-height: 10pt; font-size: 18px;">xx</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
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
                        <div class="table-responsive">
                            <table class="table table-test table-curved table-hover" style="width:100%; margin:auto;">
                                <thead class="thead-white">
                                    <tr><th>Nombre Hotel</th><th>Direccion Hotel</th><th>Fecha inicio</th><th>Fecha Termino</th></tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach($fetch_reservas as $f){
                                        echo "<tr><td>$f[0]</td><td>$f[1]</td><td>$f[2]</td><td>$f[3]</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="transporte" role="tabpanel" aria-labelledby="transporte-tab">
                        <div class="table-responsive">
                            <table class="table table-test table-curved table-hover" style="width:100%; margin:auto;">
                                <thead class="thead-white">
                                    <tr><th>Asiento</th><th>Fecha Compra</th><th>Fecha Viaje</th><th>Ciudad origen</th><th>Ciudad destino</th></tr>
                                </thead>
                                <tbody>
                            <?php
                                foreach($fetch_tickets as $f){
                                    $int3=intval($f[3]);
                                    $int4=intval($f[4]);
                                    $query_origen = "SELECT nombreciudad, cid FROM ciudades WHERE cid='$int3';";
                                    $query_destino = "SELECT nombreciudad, cid FROM ciudades WHERE cid='$int4';";

                                    $result_origen = $db -> prepare($query_origen);
                                    $bool_origen = $result_origen -> execute();
                                    $fetch_origen = $result_origen -> fetchAll();

                                    $result_destino = $db -> prepare($query_destino);
                                    $result_destino -> execute();
                                    $fetch_destino = $result_destino -> fetchAll();

                                    $g='';
                                    $h='algo';
                                    if (!$bool_origen){
                                        $g='algo salio mal';
                                    }
                                    foreach($fetch_origen as $fo){
                                        $g='algo';
                                    }
                                    foreach($fetch_destino as $fd){
                                        $h=$fd[0];
                                    }

                                    echo "<tr><td>$f[0]</td><td>$f[1]</td><td>$f[2]</td><td>$fetch_origen[0]</td><td>$h</td></tr>";
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="../css/bootstrap.js"></script>
</body>
</html>
