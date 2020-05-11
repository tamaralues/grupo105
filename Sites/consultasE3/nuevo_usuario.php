<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrapE3.css" rel="stylesheet">
    <link href="css/style_usuarioE3.css" rel="stylesheet">
    <title>iniciar sesion</title>
</head>
<body>
    <main role="main" class="container my-auto pt-3 pb-3" style="border:1px solid #cecece; max-width: 500px; border-radius: 6px;">
        <div class="row">
            <div id="login" class="col-sm-8 offset-sm-2
                col-12">
                <h2 class="text-center">Regístrate</h2>
                <img class="img-fluid mx-auto d-block rounded" style="width: 40%;"
                    src="https://www.simplyhealth.co.uk/shcore/sh/furniture/images/svgs/top-nav-account-icon.svg" />
                <form>
                    <div class="form-group">
                        <label for="correo">Nombre de usuario</label>
                        <input id="user" name="user"
                            class="form-control" type="text"
                            placeholder="User_123">
                    </div>
                    <div class="form-group">
                        <label for="palabraSecreta">Nombre y apellido</label>
                        <input id="name" name="name"
                            class="form-control" type="text"
                            placeholder="first name - last name">
                    </div>
                    <div class="form-group">
                        <label for="palabraSecreta">Correo</label>
                        <input id="correo" name="correo"
                            class="form-control" type="email"
                            placeholder="correo_electronico@uc.cl">
                    </div>
                    <div class="form-group">
                        <label for="palabraSecreta">Contraseña</label>
                        <input id="pwd" name="pwd"
                            class="form-control" type="password"
                            placeholder="password">
                    </div>
                    <button type="submit" class="btn btn-dark btn-block mb-2">
                        Registrarme
                    </button>
                </form>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="css/bootstrapE3.js"></script>
</body>
</html>