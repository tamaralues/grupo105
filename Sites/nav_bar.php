<?php


require("configuracion/conexion_db_e3.php");
require("configuracion/conexion.php");

#Consulta primer meno dropdown
$query_drop1 = "SELECT nombrepais, pid FROM paises;";

#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
 $result_drop1 = $db -> prepare($query_drop1);
 $result_drop1 -> execute();
 $fetch_drop1 = $result_drop1 -> fetchAll();

 $query_drop2 = "SELECT nombreciudad, cid FROM ciudades;";

#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
 $result_drop2 = $db -> prepare($query_drop2);
 $result_drop2 -> execute();
 $fetch_drop2 = $result_drop2 -> fetchAll();

 $query_drop3 = "SELECT cid, pid FROM ciudades;";

#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
 $result_drop3 = $db -> prepare($query_drop3);
 $result_drop3 -> execute();
 $fetch_drop3 = $result_drop3 -> fetchAll();

 $query_hoteles = "SELECT nombrehotel , hid FROM hoteles;";

#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
 $result_hoteles = $db -> prepare($query_hoteles);
 $result_hoteles -> execute();
 $fetch_hoteles = $result_hoteles -> fetchAll();

 $query_lugares = "SELECT nombrelugar , idlugar FROM lugares;";

#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
 $result_lugares = $db -> prepare($query_lugares);
 $result_lugares -> execute();
 $fetch_lugares = $result_lugares -> fetchAll();

 $query_obras = "SELECT nombreobra , idobra FROM obras;";

#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
 $result_obras = $db -> prepare($query_obras);
 $result_obras -> execute();
 $fetch_lobras = $result_obras -> fetchAll();


 $query_artista = "SELECT DISTINCT nombreartista , idartista from artistas;";
 $result_artista = $db -> prepare($query_artista);
 $result_artista -> execute();
 $fetch_artista  = $result_artista -> fetchAll();

?>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-dark border-bottom shadow-sm" style="position: absolute; top: 0; width: 100%; height: 70px;">
        <a class="my-0 mr-md-auto font-weight-normal text-white" href=<?php echo"{$path_navbar}test.php"?> style="text-decoration: none;"><h5>Splinter S.A.</h5></a>
        <nav class="my-2 my-md-0 mr-md-3">
            <div class="btn-group">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-dark" data-toggle="dropdown" id="dropdown1" aria-haspopup="true" aria-expanded="false">
                        Artistas
                    </button>
                    <div class="dropdown-menu dropdown-menu" aria-labelledby="dropdown1">
                        <?php
                            foreach ($fetch_artista as $f1) {
                                echo "
                                <form action =\"{$path_navbar}consultasE3/consulta_artista.php\" method=\"post\">
                                    <button class=\"dropdown-item\" type=\"submit\" value=$f1[1] name=\"idartista\">$f1[0]</button>
                                </form>
                                ";
                            }
                        ?>
                    </div>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-dark" data-toggle="dropdown" id="dropdown3" aria-haspopup="true" aria-expanded="false">
                        Obras
                    </button>
                    <div class="dropdown-menu dropdown-menu" aria-labelledby="dropdown3">
                        <?php
                        foreach ($fetch_obras as $f) {
                            echo "
                            <form action =\"{$path_navbar}consultasE3/consulta_lugares.php\" method=\"post\">
                                  <button class=\"dropdown-item\" type=\"submit\" value=$f[1] name=\"idobra\">$f[0]</button>
                            </form>
                            ";
                        }
                        ?>
                    </div>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-dark" data-toggle="dropdown" id="dropdown3" aria-haspopup="true" aria-expanded="false">
                        Lugares
                    </button>
                    <div class="dropdown-menu dropdown-menu" aria-labelledby="dropdown3">
                        <?php
                        foreach ($fetch_lugares as $f) {
                            echo "
                            <form action =\"{$path_navbar}consultasE3/consulta_lugares.php\" method=\"post\">
                                <button class=\"dropdown-item\" type=\"submit\" value=$f[1] name=\"idlugar\">$f[0]</button>
                            </form>
                            ";
                        }
                        ?>
                    </div>
                </div>
                <?php

                if(isset($_SESSION['user'])){

                  echo "
                <div class=\"btn-group\" role=\"group\">
                    <button type=\"button\" class=\"btn btn-dark\" data-toggle=\"dropdown\" id=\"dropdown3\" aria-haspopup=\"true\" aria-expanded=\"false\">
                        Reservar Hotel
                    </button>
                    <div class=\"dropdown-menu dropdown-menu\" aria-labelledby=\"dropdown3\"> ";
                        foreach ($fetch_hoteles as $f4) {
                            echo "
                            <form action =\"{$path_navbar}consultasE3/consultas_hotel.php\" method=\"post\">
                                <button class=\"dropdown-item\" type=\"submit\" value=$f4[1] name=\"hotel\"> $f4[0] </button>
                            </form>
                            ";
                        }
                        echo "
                    </div>
                </div>";
                  }
                ?>
                <?php
                if(isset($_SESSION['user'])){
                    $post_user = $_SESSION['username'];
                    echo "
                    <div class=\"btn-group\" role=\"group\">
                        <form action=\"{$path_navbar}consultasE3/comprar_tickets.php\" method=\"post\">

                            <input type=\"hidden\" name=\"horasalida\" value= \"\" >
                            <input type=\"hidden\" name=\"medio\" value= \"\"      >
                            <input type=\"hidden\" name=\"horasalida\" value= \"\" >
                            <input type=\"hidden\" name=\"origen\" value= \"\"     >
                            <input type=\"hidden\" name=\"destino\" value= \"\"    >
                            <input type=\"hidden\" name=\"fechaviaje\" value= \"\"    >

                            <button type=\"submit\" class=\"btn btn-dark\" value=$post_user name=\"username\">
                                Comprar tickets
                            </button>
                        </form>
                    </div>";
                }
                ?>
            </div>
        </nav>
        <div class="dropdown mr-1">
            <?php
                if(isset($_SESSION['user'])){
                    $post_user = $_SESSION['username'];
                    echo "
                    <button class=\"btn btn-outline-light dropdown\" data-toggle=\"dropdown\" id=\"perfil\" data-offset=\"10,20\">
                        Mi Cuenta
                    </button>
                    <div class=\"dropdown-menu\" aria-labelledby=\"perfil\">
                        <form action=\"{$path_navbar}consultasE3/Perfil.php\" method=\"post\">
                            <button type=\"submit\" class=\"dropdown-item\" value=$post_user name=\"username\">
                                Ir al perfil
                            </button>
                        </form>
                        <form action=\"{$path_navbar}consultasE3/cerrar_cuenta.php\" method=\"post\">
                            <button type=\"submit\" class=\"dropdown-item\" value=$post_user name=\"username\">
                                Cerrar Cuenta
                            </button>
                        </form>
                        <div class=\"dropdown-divider\"></div>
                        <button onclick=\"location.href='{$path_navbar}include/logout.php'\" class=\"dropdown-item\">
                            Log Out
                        </button>
                    </div>";

                } else {
                    echo "
                    <button type=\"button\" class=\"btn btn-dark dropdown\" id=\"inicio_sesion\" data-toggle=\"dropdown\" data-offset=\"10,20\">
                        <img src=\"https://getdrawings.com/free-icon-bw/white-icons-png-19.png\" width=\"30\" />  Iniciar Sesión
                    </button>";
                }
            ?>
            <div class="dropdown-menu" aria-labelledby="inicio_sesion" style="min-width: 300px;">
                <form class="px-4 py-3" <?php echo "action=\"{$path_navbar}test.php\"" ?> method="post">
                    <div class="form-group col-md-4 col-md-offset-4">
                        <label for="user">
                            Usuario:
                        </label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="User_123" style="width: 250px;">
                    </div>
                    <div class="form-group col-md-4 col-md-offset-4">

                    <label for="mail">Email:</label>
                    <input type="email" class="form-control" id="correo" name="correo" placeholder="ejemplo123@gmail.com" style="width: 250px;">
                    </div>
                    <div class="form-group col-md-4 col-md-offset-4">
                    <label for="password">Contraseña:</label>
                    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="password" style="width: 250px;">

                    </div>
                    <div class="col text-center">
                        <button type="submit" class="btn btn-sm btn-primary btn-dark" style="width: 250px;">Ingresar</button>
                    </div>
                </form>
                <div class="dropdown-divider"></div>
                <div class="col text-center" >
                    <p>
                        Primera vez en Splinter?
                    </p>
                    <a <?php echo" href=\"{$path_navbar}consultasE3/nuevo_usuario.php\""?> class="btn btn-sm btn-primary mb-2 btn-dark" role="button" style="width: 250px;">Registrarme</a>
                </div>
            </div>
        </div>

    </div>
