<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  #Se obtiene el valor del input del usuario
  $name = $_POST["reservas"];
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

<div class="card mb-4 shadow-sm">
  <div class="card-header">
    <h4 class="my-0 font-weight-normal">Consulta 3</h4>
    </div>
  <div class="card-body">
    <h3 class="card-title pricing-card-title">Paises visitados por Usuario</h3>
    <ul class="list-unstyled mt-3 mb-4">
    <li><h6 class="my-0 font-weight-normal"> retorna una lista con todos los países en que se ha hospedado el usuario ingresado</h6></li>
    </ul>
    <form align="center" action="consultas/username_hospedajes.php" method="post">
      <input type="text" class="form-control" name="username" aria-describedby="emailHelp" placeholder="ingrese el username">
      <br>
      <button type="submit" class="btn btn-lg btn-block btn-primary">Consultar</button>
    </form>
  </div>
</div>

<body>

    <?php echo "<p>$name</p>"; ?>
