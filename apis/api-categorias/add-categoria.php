<?php
    include('../database.php');

    if(isset($_POST['nombre'])) {
        
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $imagen = $_POST['imagen'];
        $id_Admin = 1;
        $query = "INSERT INTO categorias(id_Categoria, id_Admin, Nombre, imagen) VALUES ('$id', '$id_Admin','$nombre', '$imagen')";

        $res = mysqli_query($con, $query);
        if(!$res){
            die('La consulta ah fallado');
        }

        echo 'Categoria Agregada, Con ID: ' . $id;
    }
?>