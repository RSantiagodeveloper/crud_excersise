<?php

    session_start();
    include('keydb.php');

    if(isset($_POST['start_session'])){
        
        $correo = $_POST['user_mail'];
        $passwd_ = $_POST['user_pass'];

        $query = "SELECT * FROM usuarios WHERE correo = '$correo' AND passwords = '$passwd_'"; //consulta
        $result = $conn->query($query);
        
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $_SESSION["crud_user"] = 'acceso';
                $_SESSION["nickname_user"] = $row['nickname'];
                $_SESSION["id_session"] = $row['id'];
            }
            header("Location: ../crud_screen.php");
            
            
        }else{
            header("Location: ../index.php");
        }

    }

?>