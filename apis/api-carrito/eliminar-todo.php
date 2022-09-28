<?php

    include('../database.php');
       $query = "DELETE FROM carrito";
       $result = mysqli_query($con, $query);

       if(!$result){
           die('Query Failed');
       }

       echo 'Carrito Vacio, Agregue Compras';
?>