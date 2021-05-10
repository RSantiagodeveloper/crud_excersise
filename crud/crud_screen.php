<?php
    session_start();
    if(!$_SESSION['crud_user']){
        header("Location: index.php");
    }

    $user_str = $_SESSION['nickname_user'];
    $id_user = $_SESSION['id_session'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="./styles/style.css">
    <title>crud</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://i.pinimg.com/originals/fb/eb/8c/fbeb8cde144705833bcd48a035691018.png"
                width="64" height="64" alt="img">
            </a>
            
            <span class="navbar-text">
                Bienvenido: <?php echo $user_str?>
                <a href="./php/logout.php" class="btn btn-sm btn-outline-secondary">Cerrar sesión</a>
            </span>
        </div>
    </nav>

    <header class="row justify-content-center">
        <h1>Bienvenido de nuevo: <strong><?php echo $user_str?></strong></h1>
    </header>

    <div class="row justify-content-center">
        <div class="col-4">
            <header>
                <h3 class="text-center">Formulario para añadir tarea</h3>
            </header>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-8">
            <form action="./php/create_task.php" method="post" name="form_task">
                <label for="id_title">Titulo</label><input type="text" id="id_title" name="titulo">
                <label for="id_desc">Descripcion</label><input type="text" id="id_desc" name="descr">
                <label for="id_date">Fecha</label><input type="date" id="id_date" name="fecha">
                <input type="submit" value="Guardar" class="btn btn-info" name="enviar">
            </form>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12"><h3 class="text-center">Visualiza tus tareas</h3></div>
        <div class="col-10">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Control</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        include('./php/keydb.php');
                        $query = "SELECT * FROM tarea WHERE id_usr='$id_user'";
                        $result_task = $conn->query($query);
                        if(!$result_task->num_rows > 0){
                            echo "Fallo al realizar operacion ". mysqli_error($conn);
                        }
                        while ($row = $result_task->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['titulo']?></td>
                                <td><?php echo $row['descripcion']?></td>
                                <td><?php echo $row['fecha']?></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="./php/delete.php?id=<?php echo $row['id']?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>