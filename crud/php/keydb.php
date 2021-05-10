<?php
    //server
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "trainer_php_mysql"; //nombre de la base

    //conexion con el servidor y con la db
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_errno) {
        echo "Fallo la conexion con el servidor: ". $mysqli->connect_errno ." ". $mysqli->connect_error;
    }

?>