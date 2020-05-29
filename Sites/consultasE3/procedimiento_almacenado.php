
<?php
require("../configuracion/conexion_db_e3.php");
include_once '../include/user.php';
include_once '../include/user_session.php';

$user_session = new userSession();
$user = new User($db);

$post_username = $_POST['username'];

if (isset($_SESSION['user'])){
   # echo "<p>hay sesion iniciada</p>";
    $user->setUser($user_session->getCurrentUser());
    }
else{
    #echo "<p>iniciando sesion: $post_username</p>";
  $user_session -> setCurrentUser($post_username);
  $user -> setUser($post_username);

}

?>

<head>
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../css/bootstrapE3.css" rel="stylesheet">
    <link href="../css/estiloE3.css" rel="stylesheet">
    <title>Compra de tickets</title>
</head>

<body>

  <?php
    $path_navbar ='../';
    include_once '../nav_bar.php';
  ?>
  <div class="container px-4 py-2" style="width:90%; margin-top: 100px;">


<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../configuracion/conexion.php");

#Hacer consulta 1
$query = "SELECT DISTINCT idartista, nombreartista from artistas order by idartista;";
$result = $db -> prepare($query);
$result -> execute();
$artista = $result -> fetchAll();

$query1 = "SELECT DISTINCT idciudad, nombreciudad from ciudades order by idciudad;";
$result1 = $db -> prepare($query1);
$result1 -> execute();
$ciudades = $result1 -> fetchAll();
?>
<div class="row">
<div class="column">
<p><table class="table table-striped table-bordered" style="width:70%; margin:auto">
  <tr>
  <th>Nombre </th>

  </tr>
<form  align="left" action="itinerario.php" method="post">
<?php foreach ($artista as $a): ?>
    <tr>  <td>
  <label><input type="checkbox" name="idartistas[]" value= <?php echo "$a[0]"?>/><?php echo "$a[1]"?></label>
</td> </tr>
<?php endforeach; ?>

</table></p>
</div>
<div class="column">
<p><table class="table table-striped table-bordered" style="width:70%; margin:auto">
  <tr>
  <th>Nombre </th>

  </tr>
<?php foreach ($ciudades as $a): ?>
    <tr>  <td>
  <label><input type="radio" name="idciudad" value= <?php echo "$a[0]"?>/><?php echo "$a[1]"?></label>
</td> </tr>
<?php endforeach; ?>

</table ></p>
</div>
</div>
Ingresar fecha de inicio:
<input type="date" name="fechainicio"/>
<input type="submit" name="formSubmit" value="IR" />
</form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="../css/bootstrap.js"></script>
</body>
</html>
