<!DOCTYPE html>
<html lang="en">

?>
<head>
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../css/bootstrapE3.css" rel="stylesheet">
    <link href="../css/style_usuarioE3.css" rel="stylesheet">
    <title>iniciar sesion</title>
</head>
<body>
    <main role="main" class="container my-auto pt-3 pb-3" style="border:1px solid #cecece; max-width: 500px; border-radius: 6px;">
        <div class="row">
            <div id="login" class="col-sm-8 offset-sm-2
                col-12">
                <h2 class="text-center">Regístrate</h2>
                <img class="img-fluid mx-auto d-block rounded" style="width: 35%;"
                    src="https://www.simplyhealth.co.uk/shcore/sh/furniture/images/svgs/top-nav-account-icon.svg" />
                <form action="nuevo_usuario.php" method="post">
                    <div class="form-group">
                        <label for="user"><b>Nombre de usuario</b></label>
                        <input id="user" name="user"
                            class="form-control" type="text"
                            placeholder="User_123">
                    </div>
                    <div class="form-group">
                        <label for="name"><b>Nombre y apellido</b></label>
                        <input id="name" name="name"
                            class="form-control" type="text"
                            placeholder="first name - last name">
                    </div>
                    <div class="form-group">
                        <label for="direccion"><b>Dirección</b></label>
                        <input id="direccion" name="direccion"
                            class="form-control" type="text"
                            placeholder="pais, ciudad, #domicilio">
                    <div class="form-group">
                        <label for="correo"><b>Correo</b></label>
                        <input id="correo" name="correo"
                            class="form-control" type="email"
                            placeholder="correo_electronico@uc.cl">
                    </div>
                    <div class="form-group">
                        <label for="pwd"><b>Contraseña</b></label>
                        <input id="pwd" name="pwd"
                            class="form-control" type="password"
                            placeholder="password">
                    </div>
                    <button type="submit" class="btn btn-dark btn-block mb-2" name="button_registro" value="click">
                        Registrarme
                    </button>
                </form>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="../css/bootstrap.js"></script>
</body>

<?php #funcion registro usuario
function registrar(){
    echo "ejecutando funcion";
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../configuracion/conexion_db_e3.php");

  #Se obtiene el valor del input del usuario
  $name = $_POST["name"];
  $direccion = $_POST["direccion"];
  $user = $_POST["user"];
  $correo = $_POST["correo"];
  $pwd = $_POST["pwd"];

 #Consulta para saber si existe el usuario/correo, y cual UID correspondería
 $query_uid = "SELECT uid, username, correo, password, nombreusuario, direccionusuario FROM usuarios NATURAL JOIN cuentas order by uid desc;";

 #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
   $result_uid = $db -> prepare($query_uid);
   $result_uid -> execute();
   $fetch_uid = $result_uid -> fetchAll();

   $last_uid = 0;
   $bool_correo = FALSE;
   $bool_username = FALSE;
   foreach ($fetch_uid as $p) {
     if ($last_uid < $p[0]){
       $last_uid=$p[0];
     }
     if ($p[1] == $user){
         $bool_username = TRUE;
     }
     if ($p[2] == $correo) {
         $bool_correo = TRUE;
     }
 }
 #id del usuario que se debe añadir
 $last_uid +=1;
if (!$bool_username && !$bool_correo) {
   // echo "ejecutando inserciones";
  #Se construye la consulta como un string
    $query_usuario = "INSERT INTO usuarios(uid, username, correo, password) VALUES ('$last_uid', '$user', '$correo', '$pwd');";
    $query_cuentas = "INSERT INTO cuentas(nombreusuario, username, direccionusuario) VALUES ('$name', '$user', '$direccion');";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result_usuario = $db -> prepare($query_usuario);
    $bool_usuario = $result_usuario -> execute();
    
    $result_cuentas = $db -> prepare($query_cuentas);
    $bool_cuentas = $result_cuentas -> execute();
    }

    if(isset($_POST['button_registro']))
{
   registrar();
} 
}
?>
</html>