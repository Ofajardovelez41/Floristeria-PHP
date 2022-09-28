<?php

    include('../database.php');

    $id = $_POST['id'];
    $id_Categoria = $_POST['categoriaSe'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $imagen = $_POST['imagen'];

    $query = "UPDATE productos SET Categorias_idCategorias = '$id_Categoria', nombre = '$nombre', precio = '$precio', cantidad_stock = '$stock', imagen = '$imagen' WHERE id_producto = '$id'";
    $result = mysqli_query($con, $query);

       if(!$result){
           die('Query Failed');
       }

       echo 'Producto con ID: '. $id .' Editado con Exito';
?>