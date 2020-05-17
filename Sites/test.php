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

 $query_drop4 = "SELECT nombrehotel , hid FROM hoteles;";

#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
 $result_drop4 = $db -> prepare($query_drop4);
 $result_drop4 -> execute();
 $fetch_drop4 = $result_drop4 -> fetchAll();


 #inicio de sesion

#inicio sesion
include_once 'include/user.php';
include_once 'include/user_session.php';

$user_session = new userSession();
$user = new User($db);
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
                                <button class=\"dropdown-item\" type=\"submit\" value=$f4[1] name=\"hotel\"> $f4[0] </button>

                            </form>
                            ";
                        }
                        ?>
                    </div>
                </div>
                <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-dark" id="dropdown3" aria-haspopup="true" aria-expanded="false">
                        <p><a href="consultasE3/comprar_tickets.php">Comprar tickets</a></p>
                    </button>
                </div>
            </div>
        </nav>
        <div class="dropdown mr-1">
            <?php
                if((isset($_SESSION['user']))||(isset($_POST['username']) && isset($_POST['pwd']))){
                    echo "
                    <button class=\"btn btn-outline-light dropdown\" data-toggle=\"dropdown\" id=\"perfil\" data-offset=\"10,20\">
                        perfil
                    </button>
                    <div class=\"dropdown-menu\" aria-labelledby=\"perfil\">
                        <button onclick=\"location.href='include/logout.php'\" class=\"dropdown-item\">
                            Log Out
                        </button>
                    </div>";

                } else {
                    echo "
                    <button type=\"button\" class=\"btn btn-outline-light dropdown\" id=\"inicio_sesion\" data-toggle=\"dropdown\" data-offset=\"10,20\">
                        Iniciar Sesión
                    </button> ";
                }
            ?>
            <div class="dropdown-menu" aria-labelledby="inicio_sesion" style="min-width: 300px;">
                <form class="px-4 py-3" action="test.php" method="post">
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
                    <a href="consultasE3/nuevo_usuario.php" class="btn btn-sm btn-primary mb-2 btn-dark" role="button" style="width: 250px;">Registrarme</a>
                </div>
            </div>
        </div>
    </div>

<?php
#testeo inicio de sesion
if (isset($_SESSION['user'])){
    echo "<p>hay sesion iniciada</p>";
    $user->setUser($user_session->getCurrentUser());
} else if (isset($_POST['username']) && isset($_POST['pwd'])){
    $user_form = $_POST['username'];
    $pwd_form = $_POST['pwd'];

    session_start();

    $_SESSION["loggedin"] = true;

    $query = "SELECT uid, username FROM usuarios ;";

		$result = $db -> prepare($query);
    $result -> execute();
    $username = $result -> fetchAll();

		foreach ($username as $p){
			if($p[1] == $user_form){
				$uid = $p[0];
			}
		}

    $_SESSION["id"] = $uid;
    $_SESSION["username"] = $user_form;

    echo "<p>validando login: username - $user_form, pwd - $pwd_form</p>";
    if ($user->userExists($user_form, $pwd_form)) {
        echo "<p>usuario validado</p>";
        $user_session -> setCurrentUser($user_form);
        $user -> setUser($user_form);
    } else {
        $error_login = "nombre, correo o pwd incorrecto";
        echo "<p>algo salio mal</p>";
    }
} else {
    echo "<p>hay que logear</p>";
}
?>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
      <script src="css/bootstrap.js"></script>
</body>
</html>
