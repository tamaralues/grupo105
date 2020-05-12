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
                                    <button class=\"dropdown-item\" type=\"button\">$f3[0]</button>
                                ";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </nav>
        <div class="dropdown mr-1">
            <button type="button" class="btn btn-outline-light dropdown" id="inicio_sesion" data-toggle="dropdown" data-offset="10,20">
                Iniciar Sesión
            </button>
        <div class="dropdown-menu" aria-labelledby="inicio_sesion" style="min-width: 300px;">
                <form class="px-4 py-3" action="consultasE3/home_login.php" method="post" onsubmit="return validarForm(this.elements);">
                    <div class="form-group col-md-4 col-md-offset-4">
                        <label for="exampleDropdownFormEmail1">
                            Usuario:
                        </label>
                      <input type="text" class="form-control" id="username" placeholder="User_123" style="width: 250px;">
                    </div>
                    <div class="form-group col-md-4 col-md-offset-4">
                      <label for="exampleDropdownFormPassword1">Email:</label>
                      <input type="email" class="form-control" id="correo" placeholder="ejemplo123@gmail.com" style="width: 250px;">
                    </div>
                    <div class="form-group col-md-4 col-md-offset-4">
                      <label for="exampleDropdownFormPassword1">Contraseña:</label>
                      <input type="password" class="form-control" id="pwd" placeholder="password" style="width: 250px;">
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
                    <a href="consultasE3/nuevo_usuario.php" class="btn btn-sm btn-primary mb-2 btn-dark" role="button" style="width: 250px;">Registrarme</a>
                </div>
            </div>
        </div>
    </div>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
      <script src="css/bootstrap.js"></script>
</body>
</html>