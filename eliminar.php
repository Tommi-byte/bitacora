<?php

    include("db.php");


    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM informe WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Fallo el query");
        }

        $_SESSION['message'] = "Registro Borrado";
        $_SESSION['message_type'] = 'danger';
        header("Location: buscar.php");



    }



?>
