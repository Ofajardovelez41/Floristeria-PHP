<?php

    include('../database.php');

    $id_Mensaje = $_POST['id_Mensaje'];
    $respuesta = $_POST['respuesta'];

    $query = "UPDATE mensajes SET respuesta = '$respuesta' WHERE mensajes.id_Mensaje = '$id_Mensaje';";
    $result = mysqli_query($con, $query);

       if(!$result){
           die('Query Failed');
       }

       echo 'Mensaje Respondido';
?>