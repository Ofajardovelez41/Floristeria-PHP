<?php

    include('../database.php');

    $nombre = $_POST['nombre'];
    $id = $_POST['id'];
    $imagen = $_POST['imagen'];

    $query = "UPDATE categorias SET Nombre = '$nombre', imagen = '$imagen' WHERE id_Categoria = '$id'";
    $result = mysqli_query($con, $query);

       if(!$result){
           die('Query Failed');
       }

       echo 'Categoria con ID: '. $id . ' Editada con Exito';
?>