<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Pricing example · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/pricing/">

    <!-- Bootstrap core CSS -->
<link href="../css/main_query.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="icon/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
  </head>
<body>
<?php
#crea el PDO para realizar las consultas
require("../configuracion/conexion_db.php");

$fecha_inicio= $_POST["fecha_inicial"];
$fecha_termino =$_POST["fecha_final"];

#se realiza la consulta, esta no tiene inputs
$query = "SELECT uid, username, SUM(precio) FROM usuarios natural join tickets_comprados natural join datos_viaje 
WHERE fechacompra >='$fecha_inicio 00:00:00' and fechacompra <= '$fecha_termino 23:59:59' GROUP BY uid;";

#se asocia la consulta a una db, se ejecuta y el resultado se guarda en una variable
$result = $db -> prepare($query);
$result -> execute();
$ciudades = $result -> fetchAll();
?>
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h3 class="display-4">Resultado consulta 6</h3>
</div>
<div class="container">
  <table class="table table-striped table-bordered" style="width:70%; margin:auto">
    <tr>
      <th>ID del usuario </th>
      <th>username </th>
      <th>Dinero gastado en tickets </th>
    </tr>

      <?php
        foreach ($ciudades as $p) {
          echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td></tr>";
      }
      ?>
  </table>
</div>
</body>
