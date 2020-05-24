<?php
require("../configuracion/conexion_db_e3.php");
include_once '../include/user.php';
include_once '../include/user_session.php';

$user_session = new userSession();
$user = new User($db);


$post_username = $_POST['username'];


if (isset($_SESSION['user'])){
   # echo "<p>hay sesion iniciada</p>";
    $user->setUser($user_session->getCurrentUser());}
else{
    #echo "<p>iniciando sesion: $post_username</p>";
$user_session -> setCurrentUser($post_username);
$user -> setUser($post_username);
}
    $uid = $_SESSION['id'];

    $origen = $_POST["origen"];
    $destino = $_POST["destino"];

    $horasalida = $_POST["horasalida"];
    $medio =  $_POST["medio"];
    $fechaviaje = $_POST["fechaviaje"];

    if($fechaviaje){
      $direccion = "confirmacion_compra.php";
    }
    else {
      $direccion  = "comprar_tickets.php";
    }


    ## Obtenemos el nombre origen
    $query_drop02 = "SELECT nombreciudad, cid_origen  FROM datos_viaje natural join ciudades where datos_viaje.cid_origen = ciudades.cid ;";
    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result_drop02 = $db -> prepare($query_drop02);
    $result_drop02 -> execute();
    $fetch_drop02 = $result_drop02 -> fetchAll();

    ## eliminamos duplicados
    $paises_origen = array_unique($fetch_drop02 , SORT_REGULAR);

    foreach ($fetch_drop02 as $p ) {
      if ($p[1] == $origen ) {
        $origen_nombre = $p[0];
      }
    }

    ## Obtenemos el nombre destino
    $query_drop01 = "SELECT nombreciudad, cid_destino FROM datos_viaje natural join ciudades where datos_viaje.cid_destino = ciudades.cid and datos_viaje.cid_origen = '$origen' ;";
     #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result_drop01 = $db -> prepare($query_drop01);
    $result_drop01 -> execute();
    $fetch_drop01 = $result_drop01 -> fetchAll();

    ## eliminamos duplicados
    $paises_destino = array_unique($fetch_drop01 , SORT_REGULAR);

    foreach ($fetch_drop01 as $d ) {
      if ($d[1] == $destino ) {
        $destino_nombre = $d[0];
      }
    }

    ## Obtenemos el medio, según la disponibilidad por origen y destino
    $query_filtro03 = "SELECT medio FROM datos_viaje where cid_origen = '$origen' and cid_destino = '$destino' ;";
    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result_filtro03  = $db -> prepare($query_filtro03);
    $result_filtro03  -> execute();
    $fetch_filtro03  = $result_filtro03  -> fetchAll();

    ## eliminamos duplicados
    $medios = array_unique($fetch_filtro03, SORT_REGULAR);

    ## Obtenemos el medio, según la disponibilidad por origen y destino
    $query_filtro04 = "SELECT horasalida FROM datos_viaje where cid_origen = '$origen' and cid_destino = '$destino' and medio = '$medio' ;";
    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result_filtro04  = $db -> prepare($query_filtro04);
    $result_filtro04  -> execute();
    $fetch_filtro04  = $result_filtro04  -> fetchAll();


    $query_drop6 = "SELECT uid , tid FROM tickets_comprados where uid = '$uid';";
    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result_drop6 = $db -> prepare($query_drop6);
    $result_drop6 -> execute();
    $fetch_drop6 = $result_drop6 -> fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

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
       <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
       <h3 class="display-4">Comprar Tickets</h3>
       </div>

          <form action = <?php echo $direccion ;?> method="POST">
                <div class="form-group">
                  Seleccione la cuidad de origen:
                    <select name="origen" >
                        <?php
                        if(!$origen){
                          foreach ($paises_origen as $f5) {
                              echo "
                                  <option value = '$f5[1]' > $f5[0] </option>
                              ";
                            }
                        }
                        else {
                          echo "
                              <option value = '$origen' > $origen_nombre </option>
                          ";
                        }
                        ?>

                    </select>
                </div>
                <div class="form-group">
                    <select name="destino" >
                      <?php
                      if($origen){
                        echo
                        "
                        Seleccione la cuidad de destino: 

                        ";

                        if(!$destino){
                          foreach ($paises_destino as $f7) {
                              echo "
                                  <option value = '$f7[1]' > $f7[0] </option>
                              ";
                            }
                        }
                        else {
                          echo "
                              <option value = '$destino' > $destino_nombre </option>
                          ";

                        }
                      }
                      ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="medio" >
                      <?php
                      if($destino){
                        echo
                        "
                        <div> Seleccione el medio de transporte: </div>

                        ";
                        if(!$medio){
                          foreach ($medios as $f8) {
                              echo
                              "
                                  <option value = '$f8[0]' > $f8[0] </option>
                              ";
                          }
                        }
                          else{
                            echo "
                                <option value = '$medio' > $medio </option>
                            ";
                          }

                        }

                      ?>

                    </select>
                </div>
                <div class="form-group" >
                    <select name="horasalida" >
                      <?php
                      if($medio){
                        echo
                        "
                        <div> Seleccione la hora de salida: </div>

                        ";
                        if(!$horasalida){
                          foreach ($fetch_filtro04 as $f9) {
                              echo
                              "
                                  <option value = '$f9[0]' > $f9[0] </option>
                              ";
                          }
                        }
                        else {
                          echo "
                              <option value = '$horasalida' > $horasalida </option>
                          ";
                        }
                      }

                      ?>
                    </select>
                </div>
               <div class="btn-group" role="group">
                <?php
                if($medio){
                  echo
                     "
                     <input type=\"date\" class=\"form-control\" name=\"fechaviaje\" aria-describedby=\"emailHelp\" placeholder=\"ingrese la fecha de salida\">
                     ";
                  }
                ?>
                </div>

                <?php

                if(!$destino and !$origen ){
                  echo
                     " <button type=\"submit\" class=\"btn btn-dark btn-block mb-2\">
                         Revisar disponibilidad
                        </button>
                      ";
                  }
                elseif (!$medio) {
                  echo
                     " <button type=\"submit\" class=\"btn btn-dark btn-block mb-2\">
                         Ver horarios disponibles
                        </button>
                      ";
                }
                elseif (!$horasalida and $medio and $destino and $origen) {
                  echo
                     " <button type=\"submit\" class=\"btn btn-dark btn-block mb-2\">
                         Ver horarios disponibles
                        </button>
                      ";
                }
                elseif ($horasalida and !$fechaviaje) {
                  echo
                  "
                  <button type=\"submit\" class=\"btn btn-dark btn-block mb-2\">
                      Comprar
                  </button>
                  ";

                }
                else{
                  echo
                  "
                  <div class=\"pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center\">
                  Lo sentimos, no hay tickets disponibles
                  </div>

                  <input type=\"hidden\" name=\"horasalida\" value= \"\" >
                  <input type=\"hidden\" name=\"medio\" value= \"\"      >
                  <input type=\"hidden\" name=\"horasalida\" value= \"\" >
                  <input type=\"hidden\" name=\"origen\" value= \"\"     >
                  <input type=\"hidden\" name=\"destino\" value= \"\"    >

                  <button type=\"submit\" class=\"btn btn-dark btn-block mb-2\">
                      Realizar otra búsqueda
                  </button>

                  ";
                }
                ?>
                </form>
            </div>


    <?php echo "<p>$medio medio </p>"; ?>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h3 class="display-4">Tickets vendidos</h3>
    </div>
    <div class="container">
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <thead class="thread-dark">
            <tr>
              <th>ID del usuario</th>
            </tr>
          </thead>
          <?php
            foreach ($fetch_drop6 as $p) {
              echo "<tr><td>$p[0]</td><td>$p[1]</td></tr>";
          }
          ?>
        </table>
      </div>
    </div>

    <form action ="../test.php" method="POST">
          <br>
          <button type="submit" class="btn btn-dark btn-block mb-2">
              Volver
          </button>
    </form>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
      <script src="../css/bootstrap.js"></script>
</body>
</html>
