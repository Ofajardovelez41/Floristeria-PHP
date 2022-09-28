<?php
    include('../database.php');

    $id = $_POST['id'];
    $cantidadRestada = $_POST['cantidadProducto'];
    $query = "UPDATE `productos` SET `cantidad_stock` = cantidad_stock - $cantidadRestada WHERE `productos`.`id_producto` = '$id';";

    $res = mysqli_query($con, $query);
    if(!$res){
        die('La consulta ah fallado');
    }

    echo 'Stock Restado para Producto con ID: ' . $id;
?>