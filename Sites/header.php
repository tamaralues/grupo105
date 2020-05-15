<?php
#generar elementos dropdown
require("configuracion/conexion_db_e3.php");

#Se obtiene el valor del input del usuario

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

 $query_drop4 = "SELECT nombrehotel FROM hoteles;";

#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
 $result_drop4 = $db -> prepare($query_drop4);
 $result_drop4 -> execute();
 $fetch_drop4 = $result_drop4 -> fetchAll();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrapE3.css" rel="stylesheet">
    <link href="css/estiloE3.css" rel="stylesheet">
    <title>Documento random</title>
</head>

<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-dark border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal text-white">Splinter S.A.</h5>
        <nav class="my-2 my-md-0 mr-md-3">
          <?php
          		session_start();
          		echo '
          		<div class="container body-content" style="margin-top:50px">
          			<h2>Bienvenido '.$_SESSION['user'].'</h2>
          			<p class="lead"></p>
          		</div>'
          ?>
        <div class="btn-group">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-dark" data-toggle="dropdown" id="dropdown1" aria-haspopup="true" aria-expanded="false">
                        Artistas
                    </button>
                    <div class="dropdown-menu dropdown-menu" aria-labelledby="dropdown1">
                        <?php
                            foreach ($fetch_drop1 as $f1) {
                                echo "
                                <form action =\"consultasE3/consulta_artista.php\" method=\"post\">
                                    <button class=\"dropdown-item\" type=\"submit\" value=$f1[0] name=\"artista\">$f1[0]</button>
                                </form>
                                ";
                            }
                        ?>
                    </div>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-dark" data-toggle="dropdown" id="dropdown2" aria-haspopup="true" aria-expanded="false">
                        Obras
                    </button>
                    <div class="dropdown-menu dropdown-menu" aria-labelledby="dropdown2">
                        <?php
                            foreach ($fetch_drop2 as $f2) {
                                echo "
                                    <button class=\"dropdown-item\" type=\"button\">$f2[0]</button>
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
                        foreach ($fetch_drop3 as $f3) {
                            echo "
                            <form action =\"consultasE3/consulta_lugares.php\" method=\"post\">
                                <button class=\"dropdown-item\" type=\"submit\" value=$f1[0] name=\"lugares\">$f1[0]</button>
                            </form>
                            ";
                        }
                        ?>
                    </div>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-dark" data-toggle="dropdown" id="dropdown3" aria-haspopup="true" aria-expanded="false">
                        Hoteles
                    </button>
                    <div class="dropdown-menu dropdown-menu" aria-labelledby="dropdown3">
                        <?php
                        foreach ($fetch_drop4 as $f4) {
                            echo "
                            <form action =\"consultasE3/consultas_hotel.php\" method=\"post\">
                                <button class=\"dropdown-item\" type=\"submit\" value=$f4[0] name=\"reservas\">$f4[0]</button>
                            </form>
                            ";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </nav>
    </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="css/bootstrap.js"></script>
</body>
</html>
