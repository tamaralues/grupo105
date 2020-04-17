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
<link href="css/main.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">Consultas Entrega 2</h1>
</div>

<div class="container">
  <div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Consulta 1</h4>
      </div>
      <div class="card-body">
        <h3 class="card-title pricing-card-title"><b><i>username</i></b></h3>
        <br>
        <ul class="list-unstyled mt-3 mb-4">
          <li><h6 class="my-0 font-weight-normal"> retorna una lista con todos los <i>username</i> y su correo asociado</h6></li>
        </ul>
        <p>  </p>
        <br>
        <br>
        <button type="submit" class="btn btn-lg btn-block btn-primary">Consultar</button>
      </div>
    </div>
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Consulta 2</h4>
      </div>
      <div class="card-body">
        <h3 class="card-title pricing-card-title">Ciudades por país</h3>
        <br>
        <ul class="list-unstyled mt-3 mb-4">
        <li><h6 class="my-0 font-weight-normal"> retorna una lista con todas las ciudades del país ingresado</h6></li>
        </ul>
        <form align="center" action="consultas/ciudades_del_pais.php" method="post">
          <input type="text" class="form-control" name="pais" aria-describedby="emailHelp" placeholder="ingrese el nombre del pais">
          <br>
          <button type="submit" class="btn btn-lg btn-block btn-primary">Consultar</button>
        </form>
      </div>
    </div>
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
          <input type="text" class="form-control" name="pais_enviado" aria-describedby="emailHelp" placeholder="ingrese el username">
          <br>
          <button type="submit" class="btn btn-lg btn-block btn-primary">Consultar</button>
        </form>
      </div>
    </div>
  </div>
  <div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Consulta 1</h4>
      </div>
      <div class="card-body">
        <h3 class="card-title pricing-card-title"><b><i>username</i></b></h3>
        <br>
        <ul class="list-unstyled mt-3 mb-4">
          <li><h6 class="my-0 font-weight-normal"> retorna una lista con todos los <i>username</i> y su correo asociado</h6></li>
        </ul>
        <p>  </p>
        <br>
        <br>
        <button type="submit" class="btn btn-lg btn-block btn-primary">Consultar</button>
      </div>
    </div>
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Consulta 2</h4>
      </div>
      <div class="card-body">
        <h3 class="card-title pricing-card-title">Ciudades por país</h3>
        <br>
        <ul class="list-unstyled mt-3 mb-4">
        <li><h6 class="my-0 font-weight-normal"> retorna una lista con todas las ciudades del país ingresado</h6></li>
        </ul>
        <form align="center" action="consultas/ciudades_del_pais.php" method="post">
          <input type="text" class="form-control" name="pais" aria-describedby="emailHelp" placeholder="ingrese el nombre del pais">
          <br>
          <button type="submit" class="btn btn-lg btn-block btn-primary">Consultar</button>
        </form>
      </div>
    </div>
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
          <input type="text" class="form-control" name="pais_enviado" aria-describedby="emailHelp" placeholder="ingrese el username">
          <br>
          <button type="submit" class="btn btn-lg btn-block btn-primary">Consultar</button>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
