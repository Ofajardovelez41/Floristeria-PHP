<?php
include('../database.php');

$query = "SELECT compras.id_compra, usuarios.username, productos.nombre, direccion.ciudad, direccion.municipio, direccion.barrio, direccion.informacion_adicional, compras.precio, compras.fecha, compras.cantidad_producto, compras.estado_compra, compras.total FROM compras, usuarios, productos, direccion WHERE compras.Usuarios_nid = usuarios.nid AND compras.Productos_id_producto = productos.id_producto AND compras.idDireccion = direccion.idDireccion";

$res = mysqli_query($con, $query);

if(!$res){
    die('Query Failed' . mysqli_error($con));
}

$json = array();
while($row = mysqli_fetch_array($res)){
    $json[] = array(
        'id_compra' => $row['id_compra'],
        'usuario' => $row['username'],
        'direccion' => $row['ciudad'].'-'. $row['municipio'].'-'.$row['barrio'].'-'.$row['informacion_adicional'], 
        'producto' => $row['nombre'],
        'precio' => $row['precio'],
        'fecha' => $row['fecha'],
        'cantidad_pro' => $row['cantidad_producto'],
        'estado_compra' => $row['estado_compra'],
        'total' => $row['total']
    );
}

$jsonString = json_encode($json);

echo $jsonString;
?>