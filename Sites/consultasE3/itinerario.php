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

  #Se obtiene el valor del input del usuario
  $ciudad = intval($_POST["idciudad"]);
  $array_artistas = $_POST["idartistas"];
  $fecha = $_POST["fechainicio"];
  $artistas = "(";
  $number3 = 0;

  $diccionario = array(
    1    => "Roma",
    2  => "Florencia",
    3  => "Milán",
    4 => "París",
    5 => "Chantilly",
    6 => "Nancy",
    7 => "Bruselas",
    8 => "Antwerp",
    9 => "Dresde",
    10 => "Westminster",
);


  foreach($array_artistas as $a){
    if($number3 == count($array_artistas) - 1){
      $artistas .= trim($a, "/") . ")";
    }
    else{
      $artistas .= trim($a, "/") . ", ";
    }
    $number3 += 1;
  }


  #Se construye la consulta como un string
  $query1 = "SELECT idciudad from seleccionar_ciudades('$artistas');"; #SELECCIONAR VARIOS ARTISTAS
  $result1 = $db -> prepare($query1);
  $result1 -> execute();
  $procedimiento1 = $result1 -> fetchAll();

  $data = "(";
  $number2 = 0;


  foreach($procedimiento1 as $iddestino){
    if($number2 == count($procedimiento1) - 1){
      $data .= "$iddestino[0])";
    }
    else{
      $data .= "$iddestino[0], ";
    }
    $number2 += 1;
  }

  #INICIO PROCEDIMIENTO ALMACENADO
  $query2 = "SELECT DISTINCT * from itinerario_1($ciudad, '$data') order by precio1;";
  $result2 = $db1 -> prepare($query2);
  $result2 -> execute();
  $procedimiento2 = $result2 -> fetchAll();

  $query3 = "SELECT DISTINCT * from itinerario_2($ciudad, '$data') order by preciototal;";
  $result3 = $db1 -> prepare($query3);
  $result3 -> execute();
  $procedimiento3 = $result3 -> fetchAll();

  $query4 = "SELECT DISTINCT * from itinerario_3($ciudad, '$data') order by preciototal;";
  $result4 = $db1 -> prepare($query4);
  $result4 -> execute();
  $procedimiento4 = $result4 -> fetchAll();
  #TERMINO PROCEDIMIENTO ALMACENADO

  ?>
  <p style="text-align:left"> Viajes directos</p>
  <table>
    <tr>
    </tr>
  <?php
	foreach ($procedimiento2 as $a) {
    $b = $diccionario[$a[0]];
    $c = $diccionario[$a[1]];
  	echo "<tr> <td> $b - $c </td> <td> $a[6] </td> <td> $a[2] $fecha </td> <td> $a[4]$</td> </tr>";
	}
  ?>
  </table>
  <p style="text-align:left"> Viajes con 1 escala</p>
  <table>
    <tr>
    </tr>
  <?php
	foreach ($procedimiento3 as $a) {
    $b = $diccionario[$a[0]];
    $c = $diccionario[$a[1]];
    $d = $diccionario[$a[2]];
    $query5 = "SELECT tickets('$a[3]', '$a[4]', $a[5], '$fecha');";
    $result5 = $db1 -> prepare($query5);
    $result5 -> execute();
    $fecha2 = $result5 -> fetchAll();
    foreach($fecha2 as $f){
      $fecha3 = $f[0];
    }
  		echo "<tr> <td>$b - $c</td> <td>$a[10]</td> <td>$a[3] $fecha </td> <td>$c - $d</td> <td>$a[11]</td> <td>$a[4] $fecha3 </td> <td> $a[7]$ </td> </tr>";
	}
  ?>
  </table>
  <p style="text-align:left"> Viajes con 2 escalas</p>
  <table>
    <tr>
    </tr>
  <?php
  $c = 0;
	foreach ($procedimiento4 as $a) {
    $b = $diccionario[$a[0]];
    $c = $diccionario[$a[1]];
    $d = $diccionario[$a[2]];
    $e = $diccionario[$a[3]];
    $query6 = "SELECT tickets('$a[4]', '$a[5]', $a[7], '$fecha');";
    $result6 = $db1 -> prepare($query6);
    $result6 -> execute();
    $fecha4 = $result6 -> fetchAll();
    foreach($fecha4 as $f){
      $fecha5 = $f[0];
    }
    $query7 = "SELECT tickets('$a[5]', '$a[6]', $a[8], '$fecha5');";
    $result7 = $db1 -> prepare($query7);
    $result7 -> execute();
    $fecha6 = $result7 -> fetchAll();
    foreach($fecha6 as $f){
      $fecha7 = $f[0];
    }
  		echo "<tr> <td> $b - $c</td> <td>$a[13]</td> <td>$a[4] $fecha</td> <td>$c - $d</td> <td>$a[14]</td> <td>$a[5] $fecha5</td> <td>$d - $e</td> <td>$a[15]</td> <td>$a[6] $fecha7</td> <td> $a[9]$ </td> </tr>";
	}
  ?>
	</table>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="../css/bootstrap.js"></script>
  </body>
  </html>
