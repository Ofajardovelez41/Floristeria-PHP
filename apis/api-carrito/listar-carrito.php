<?php
include('../database.php');

$idUsuario = $_POST['idUser'];


$query = "SELECT productos.id_producto, productos.nombre, productos.precio, productos.imagen, carrito.id_carrito, carrito.cantidad, carrito.total, usuarios.username FROM usuarios, carrito, productos WHERE carrito.idProducto = productos.id_producto AND carrito.Usuarios_nid = '$idUsuario' AND usuarios.nid = '$idUsuario'";

$res = mysqli_query($con, $query);

if(!$res){
    die("Query Failed" . mysqli_error($con));
}

$count = mysqli_num_rows($res);

$json = array();
    while($row = mysqli_fetch_array($res)){
        $json[] = array(
            'idCarrito' => $row['id_carrito'],
            'idProducto' => $row['id_producto'],
            'nombre' => $row['nombre'],
            'precio' => $row['precio'],
            'imagen' => $row['imagen'],
            'cantidad' => $row['cantidad'],
            'total' => $row['total'],
            'user' => $row{'username'}
        );
    }

    $jsonString = json_encode($json);
// if($count==1){
//     $_SESSION['user_Admin']=$json['user'];
// }

echo $jsonString;
?>