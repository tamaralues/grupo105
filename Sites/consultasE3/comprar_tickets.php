<?php
    session_start();

    require("../configuracion/conexion_db_e3.php");


    $query_drop4 = "SELECT nombreciudad, cid_destino, horasalida, medio FROM datos_viaje natural join ciudades where datos_viaje.cid_destino = ciudades.cid ;";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
     $result_drop4 = $db -> prepare($query_drop4);
     $result_drop4 -> execute();
     $fetch_drop4 = $result_drop4 -> fetchAll();

     $query_drop5 = "SELECT nombreciudad, cid_origen, horasalida FROM datos_viaje natural join ciudades where datos_viaje.cid_origen = ciudades.cid ;";

     #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
      $result_drop5 = $db -> prepare($query_drop5);
      $result_drop5 -> execute();
      $fetch_drop5 = $result_drop5 -> fetchAll();
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
          <form action ="consultasE3/consulta_lugares.php" method=\"post\">
                <div class="btn-group" role="group">

                    <select name="origen" >
                        <?php
                        foreach ($fetch_drop5 as $f5) {
                            echo "
                                <option value = '$f5[1]' > $f5[0] </option>
                            ";
                        }
                        ?>
                    </select>
                </div>
                <div class="btn-group" role="group">

                    <select name="destino" >
                        <?php
                        foreach ($fetch_drop4 as $f4) {
                            echo "
                                <option value = '$f4[1]' > $f4[0] </option>
                            ";
                        }
                        ?>
                    </select>
                </div>
                <div class="btn-group" role="group">

                    <select name="medio" >
                        <?php
                        foreach ($fetch_drop4 as $f4) {
                            echo "
                                <option value = '$f4[3]' > $f4[3] </option>
                            ";
                        }
                        ?>
                    </select>
                </div>
                <div class="btn-group" role="group">

                    <select name="hora salida" >
                        <?php
                        foreach ($fetch_drop4 as $f4) {
                            echo "
                                <option value = '$f4[2]' > $f4[2] </option>
                            ";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-dark btn-block mb-2">
                    Comprar
                </button>
                </form>
            </div>
    </div>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
      <script src="css/bootstrap.js"></script>
</body>
</html>
