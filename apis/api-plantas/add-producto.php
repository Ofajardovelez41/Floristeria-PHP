<?php
    include('../database.php');

    if(isset($_POST['nombre'])) {
        
        $id = $_POST['id'];
        $id_Categoria = $_POST['categoriaSe'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $imagen = $_POST['imagen'];
        $query = "INSERT INTO productos (id_producto, Categorias_idCategorias, nombre, precio, 
        cantidad_stock, imagen) VALUES ('$id', '$id_Categoria', '$nombre', '$precio', '$stock', '$imagen');";

        $res = mysqli_query($con, $query);
        if(!$res){
            die('La consulta ah fallado');
        }

        echo 'Producto Agregado con ID: ' . $id;
    }
?>