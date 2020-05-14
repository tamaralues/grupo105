<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  #Se obtiene el valor del input del usuario
  $name = $_POST["reservas"];
?>

<?php echo "<p>$name</p>"; ?>
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
    <h4 class="my-0 font-weight-normal">Reaslizar reserva</h4>
    </div>
  <div class="card-body">
    <ul class="list-unstyled mt-3 mb-4">
    </ul>
    <form align="center" action="consultas/username_hospedajes.php" method="post">
      <input type="date" class="form-control" name="fechainicio" aria-describedby="emailHelp" placeholder="Ingrese la fecha de ingreso">
      <input type="date" class="form-control" name="fechatermino" aria-describedby="emailHelp" placeholder="ingrese la fecha de salida">
      <br>
      <button type="submit" class="btn btn-lg btn-block btn-primary">Reservar</button>
    </form>
  </div>
</div>

<body>
