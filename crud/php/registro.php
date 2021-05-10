<?php

    include('keydb.php');

    if(isset($_POST['create_reg'])){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $nickname = $_POST['nickname'];
        $correo = $_POST['correo'];
        $passwd_ = $_POST['passwd'];

        $query = "INSERT INTO usuarios(nombre, apellidos, nickname, correo, passwords) VALUES('$nombre', '$apellido', '$nickname', '$correo', '$passwd_')"; //comandos SQL insercion de datos en la DB
        $result = mysqli_query($conn, $query);
        if(!$result){
            echo "Fallo al realizar operacion ".mysqli_error($conn);
        }
        header("Location: ../index.php");
    }

?>