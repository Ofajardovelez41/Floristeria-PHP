<?php
include('../database.php');

$query = "SELECT mensajes.id_Mensaje,  usuarios.username, productos.nombre, mensajes.contenido, mensajes.respuesta FROM mensajes, usuarios, productos WHERE mensajes.id_Usuario = usuarios.nid AND mensajes.id_Producto = productos.id_producto";

$res = mysqli_query($con, $query);

if(!$res){
    die("Query Failed" . mysqli_error($connection));
}

$count = mysqli_num_rows($res);

$json = array();
    while($row = mysqli_fetch_array($res)){
        $json[] = array(
            'id' => $row['id_Mensaje'],
            'usuario' => $row['username'],
            'producto' => $row['nombre'],
            'mensaje' => $row['contenido'],
            'respuesta' => $row['respuesta']
        );
    }

    $jsonString = json_encode($json);
// if($count==1){
//     $_SESSION['user_Admin']=$json['user'];
// }

    echo $jsonString;
?>