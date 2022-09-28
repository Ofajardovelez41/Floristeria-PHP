<?php
include('../database.php');

    $nombre = $_POST['nombreU'];

$query = "SELECT usuarios.nid FROM usuarios WHERE usuarios.username = '$nombre'";

$res = mysqli_query($con, $query);

if(!$res){
    die("Query Failed" . mysqli_error($con));
}

$count = mysqli_num_rows($res);

$json = array();
    while($row = mysqli_fetch_array($res)){
        $json[] = array(
            'idU' => $row['nid'],
        );
    }

    $jsonString = json_encode($json[0]);

echo $jsonString;
?>