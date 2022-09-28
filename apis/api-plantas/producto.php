<?php
include('../database.php');

$id = $_POST['id'];

$query = "SELECT productos.*, categorias.id_Categoria FROM productos, categorias WHERE productos.Categorias_idCategorias = categorias.id_Categoria AND id_producto = '$id'";

$res = mysqli_query($con, $query);

if(!$res){
    die("Query Failed" . mysqli_error($con));
}

$json = array();
    while($row = mysqli_fetch_array($res)){
        $json[] = array(
            'id' => $row['id_producto'],
            'idCategoria' => $row['Categorias_idCategorias'],
            'nombre' => $row['nombre'],
            'precio' => $row['precio'],
            'descripcion' => $row['descripcion'],
            'stock' => $row['cantidad_stock'],
            'imagen' => $row['imagen']
        );
    }

    $jsonString = json_encode($json[0]);

echo $jsonString;
?>