<?php

    include('../database.php');

    if(isset($_POST['id'])){
       $id = $_POST['id']; 

       $query = "DELETE FROM categorias WHERE id_Categoria = $id";
       $result = mysqli_query($con, $query);

       if(!$result){
           die('Query Failed');
       }

       echo 'Categoria eliminada';

    }
?>