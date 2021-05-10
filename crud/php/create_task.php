<?php

    include('keydb.php');

    session_start();
    $id_usr = $_SESSION['id_session'];

    if(isset($_POST['enviar'])){
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descr'];
        $fecha = $_POST['fecha'];

        $query = "INSERT INTO tarea(titulo, descripcion, fecha, id_usr) VALUES('$titulo', '$descripcion', '$fecha', '$id_usr')"; //comandos SQL insercion de datos en la DB
        $result = mysqli_query($conn, $query);
        if(!$result){
            echo "Fallo al realizar operacion ". mysqli_error($conn);
        }
        header("Location: ../crud_screen.php");
    }

?>