

<?php
    #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    #Se obtiene el valor del input del usuario
    $name = $_POST["reservas"];
    $user = $_POST["name"];
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
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <?php echo "<p>$name</p>"; ?>
        <h4 class="my-0 font-weight-normal">Realizar reserva</h4>
        </div>
      <div class="card-body">
        <ul class="list-unstyled mt-3 mb-4">
        </ul>
        <form align="center" action="confirmacion_reserva.php" method="post">
          <input type="hidden" name="hotel" value= "<?php echo $name ;?>"  >
          <br>
          <button type="submit" class="btn btn-lg btn-block btn-primary">Reservar</button>
        </form>
      </div>
    </div>

    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Dejar comentario</h4>
        </div>
      <div class="card-body">
        <ul class="list-unstyled mt-3 mb-4">
        </ul>
        <form align="center" action="comentario_recibido.php" method="post">
          <input type="text" class="form-control" name="comentario" aria-describedby="emailHelp" placeholder="">
          <br>
          <button type="submit" class="btn btn-lg btn-block btn-primary">Comentar</button>
        </form>
      </div>
    </div>

    <body>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
      <script src="css/bootstrap.js"></script>
  </body>
  </html>
