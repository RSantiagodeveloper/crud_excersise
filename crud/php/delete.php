<?php
    include('keydb.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM tarea WHERE id=$id";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            echo "Fallo al realizar la operacion: ". mysqli_error($conn);
        }

        header("Location: ../crud_screen.php");
    }

?>