<?php

    include('../database.php');

    if(isset($_POST['id'])){
       $id = $_POST['id']; 

       $query = "DELETE FROM mensajes WHERE id_Mensaje = $id";
       $result = mysqli_query($con, $query);

       if(!$result){
           die('Query Failed');
       }

       echo 'Mensaje Borrado';

    }
?>