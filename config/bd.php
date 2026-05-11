<?php
// Conectar PHP con MySQL
$conexion = new mysql(
    hostname:"localhost",
    username:"root",
    password:"",
    database:"pokedex_pw2");

if($conexion->connect_error){
    die("Problema al conectar");
}
?>