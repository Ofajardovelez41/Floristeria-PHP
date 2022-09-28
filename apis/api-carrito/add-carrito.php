<?php
    include('../database.php');

    if(isset($_POST['idCarrito'])) {
        
        $idCarrito = $_POST['idCarrito'];
        $idProducto = $_POST['idProducto'];
        $idUsuario = $_POST['idUsuario'];
        $cantidad = $_POST['cantidad'];
        $total = $_POST['total'];
        $query = "INSERT INTO carrito (id_carrito, Usuarios_nid, idProducto, cantidad, total) VALUES ('$idCarrito', '$idUsuario', '$idProducto', '$cantidad', '$total');";

        $res = mysqli_query($con, $query);
        if(!$res){
            die('La consulta ah fallado');
        }

        echo 'Producto Agregado al carrito con ID: ' . $idCarrito;
    }
?>