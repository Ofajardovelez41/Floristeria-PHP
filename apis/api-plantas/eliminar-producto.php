<?php

    include('../database.php');

    if(isset($_POST['id'])){
       $id = $_POST['id']; 

       $query = "DELETE FROM productos WHERE id_producto = $id";
       $result = mysqli_query($con, $query);

       if(!$result){
           die('Query Failed');
       }

       echo 'Producto con ID: '. $id . ' Fué eliminado';

    }
?>