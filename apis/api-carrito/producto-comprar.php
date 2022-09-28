<?php
include('../database.php');

$idC = $_POST['idCarrito'];
$idP = $_POST['idProducto'];

$query = "SELECT carrito.id_carrito, carrito.Usuarios_nid, carrito.idProducto, productos.precio, carrito.cantidad, carrito.total FROM carrito, productos WHERE carrito.id_carrito = '$idC' AND productos.id_producto = '$idP'";

$res = mysqli_query($con, $query);

if(!$res){
    die("Query Failed" . mysqli_error($connection));
}

$json = array();
    while($row = mysqli_fetch_array($res)){
        $json[] = array(
            'idCa' => $row['id_carrito'],
            'idUs' => $row['Usuarios_nid'],
            'idPr' => $row['idProducto'],
            'precio' => $row['precio'],
            'cantidad' => $row['cantidad'],
            'total' => $row['total']
        );
    }

    $jsonString = json_encode($json[0]);

echo $jsonString;
?>