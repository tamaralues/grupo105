<?php
    $user = $_POST["username"];
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
          <a class="p-2 text-white" href="#">Artistas</a>
          <a class="p-2 text-white" href="#">Obras</a>
          <a class="p-2 text-white" href="#">Lugares</a>
        </nav>
        <div class="dropdown mr-1">
            <button type="button" class="btn btn-outline-light dropdown" id="inicio_sesion" data-toggle="dropdown" data-offset="10,20">
                Iniciar Sesión
            </button>
        <div class="dropdown-menu" aria-labelledby="inicio_sesion" style="min-width: 300px;">
                <form class="px-4 py-3" action="consultasE3/home_login.php">
                    <div class="form-group col-md-4 col-md-offset-4">
                        <label for="exampleDropdownFormEmail1">
                            Usuario:
                        </label>
                      <input type="text" class="form-control" id="username" placeholder="username" style="width: 250px;">
                    </div>
                    <div class="form-group col-md-4 col-md-offset-4">
                      <label for="exampleDropdownFormPassword1">Email:</label>
                      <input type="email" class="form-control" id="correo" placeholder="ejemplo123@gmail.com" style="width: 250px;">
                    </div>
                    <div class="col text-center">
                        <button type="submit" class="btn btn-sm btn-primary btn-dark" style="width: 250px;">Ingresar</button>
                    </div>
                </form>
                <div class="dropdown-divider"></div>
                <div class="col text-center" >
                    <p>
                        Primera vez en Splinter?
                    </p>
                    <a href="consultasE3/nuevo_usuario.php" class="btn btn-sm btn-primary mb-2 btn-dark" role="button" style="width: 250px;">Registrarme</a>
                </div>
            </div>
        </div>
    </div>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
      <script src="css/bootstrap.js"></script>
</body>
</html>