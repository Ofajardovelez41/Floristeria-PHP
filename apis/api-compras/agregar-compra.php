<?php
    include('../database.php');

    $idUsuario = $_POST['idUsuario'];
    $idProducto = $_POST['idProducto'];
    $idDireccion = $_POST['idDireccion'];
    $idCompra = $_POST['idCompra'];
    $precio = $_POST['precio'];
    $fecha = $_POST['fecha'];
    $cantidadProducto = $_POST['cantidadProducto'];
    $estadoCompra = $_POST['estadoCompra'];
    $total = $_POST['total'];
    $query = "INSERT INTO `compras` (`Usuarios_nid`, `Productos_id_producto`, `idDireccion`, `id_compra`, `precio`, `fecha`, `cantidad_producto`, `estado_compra`, `total`) VALUES ('$idUsuario', '$idProducto', '$idDireccion', '$idCompra', '$precio', '$fecha', '$cantidadProducto', '$estadoCompra', '$total');";

    $res = mysqli_query($con, $query);
    if(!$res){
        die('La consulta ah fallado');
    }

    echo 'Compra realizada con ID: ' . $idCompra;
?>