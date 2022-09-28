<?php

include('database.php');

$query = "SELECT email, username, pass FROM usuarios";

$res = mysqli_query($con, $query);

if(!$res){
    die("Query Failed" . mysqli_error($con));
}


$json = array();
    while($row = mysqli_fetch_array($res)){
        $json[] = array(
            'email' => $row['email'],
            'username' => $row['username'],
            'pass' => $row['pass']
        );
    }

    $jsonString = json_encode($json);

    echo $jsonString;
?>