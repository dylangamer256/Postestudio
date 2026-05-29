<?php

$host = "localhost";
$usuario = "root";
$password = "1234";
$bd = "postestudio";

$conn = mysqli_connect(
    $host,
    $usuario,
    $password,
    $bd
);

if(!$conn){

    die("Error conexión");

}

?>