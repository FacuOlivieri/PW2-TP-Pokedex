<?php
// Conectar PHP con MySQL
$conexion = new mysqli("localhost", "root", "", "pokedex_pw2");

if($conexion->connect_error){
    die("Problema al conectar");
}
?>