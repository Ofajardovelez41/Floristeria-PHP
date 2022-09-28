<?php

include('../database.php');

$busqueda = $_POST['busqueda'];

if(!empty($busqueda)) {
    $queryMensaje = "SELECT mensajes.id_Mensaje, usuarios.username, productos.nombre FROM mensajes, usuarios, productos WHERE mensajes.id_Mensaje LIKE '$busqueda%'";

    $result1 = mysqli_query($con, $queryMensaje);
    
    if(!$result1) {
        die('Query Error' . mysqli_error($connection));
    }

    $count1 = mysqli_num_rows($result1);

    $json = array();
        while($row = mysqli_fetch_array($result1)) {
            $json[] = array(
            'id_Mensaje' => $row['id_Mensaje'],
            'usuario' => $row['username'],
            'producto' => $row['nombre']
            );
        }

    $jsonstring = json_encode($json);

    echo $jsonstring;
}


?>