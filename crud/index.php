<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/style.css">
    <title>index</title>
    
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="https://i.pinimg.com/originals/fb/eb/8c/fbeb8cde144705833bcd48a035691018.png"
            width="64" height="64" alt="img">
        </a>
        <h2 style="color: white">Crud Básico</h2>
    </nav>
    

    <div class="container-fluid">
        <div class="row justify-content-around">
            <div class="col-md-4">
                <header>
                    <h1> Registrate aquí </h1>
                </header>
                <form name="formRegistro" action="./php/registro.php" method="post">
                    <div class="form-group">
                        <label for="id_nombre">Nombres(s)</label><input type="text" id="id_nombre" class="form-control" name="nombre" required>
                        <label for="id_apellidos">Apellidos</label><input type="text" id="id_apellidos" class="form-control" name="apellido" required>
                        <label for="id_nickname">Nickname</label><input type="text" id="id_nickname" class="form-control" name="nickname" required>
                        <label for="id_correo">Correo</label><input type="email" id="id_correo" class="form-control" name="correo" required>
                        <label for="id_pass">Contraseña</label><input type="password" id="id_pass" class="form-control" name="passwd" required>
                        <label for="id_pass_conf">confirmar Contraseña</label><input type="password" id="id_pass_conf" class="form-control" required>
                    </div>
                    <div>
                        <input type="submit" value="Registrarme" class="btn btn-dark" name="create_reg">
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <header>
                    <h1> inicio de sesión </h1>
                </header>
                <form action="./php/login.php" method="post" name="form_login">
                    <div class="form-group">
                        <label for="id_mailL">correo</label><input type="email" id="id_mailL" class="form-control" name="user_mail" required>
                        <label for="id_passL">contraseña</label><input type="password" id="id_passL" class="form-control" name="user_pass" required>
                    </div>
                    <div>
                        <input type="submit" value="Registrarme" class="btn btn-dark" name="start_session">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>