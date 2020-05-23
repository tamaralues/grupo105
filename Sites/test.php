<?php
#generar elementos dropdown
require("configuracion/conexion_db_e3.php");
require("configuracion/conexion.php");

#inicio sesion
include_once 'include/user.php';
include_once 'include/user_session.php';

$user_session = new userSession();
$user = new User($db);
?>

<?php
#testeo inicio de sesion
if (isset($_SESSION['user'])){
    #echo "<p>hay sesion iniciada</p>";
    $user->setUser($user_session->getCurrentUser());
} else if (isset($_POST['username']) && isset($_POST['pwd']) && isset($_POST['correo'])){
    $user_form = $_POST['username'];
    $pwd_form = $_POST['pwd'];
    $correo_form = $_POST['correo'];

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

   # echo "<p>validando login: username - $user_form, pwd - $pwd_form</p>, correo - $correo_form";
    if ($user->userExists($user_form, $pwd_form, $correo_form)) {
       # echo "<p>usuario validado</p>";
        $user_session -> setCurrentUser($user_form);
        $user -> setUser($user_form);
    } else {
        $error_login = "nombre, correo o pwd incorrecto";
        #echo "<p>algo salio mal: $error_login</p>";
        session_unset();
        session_destroy();
    }
} else {
    #echo "<p>hay que logear</p>";
}
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
    <?php
    $path_navbar ='';
    include_once 'nav_bar.php';
    $abc ='abc';
    echo "<p>texto:{$abc}abc</p>"
    ?>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
      <script src="css/bootstrap.js"></script>
</body>
</html>
