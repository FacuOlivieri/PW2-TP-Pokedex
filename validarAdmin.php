<?php

$usuarioIngresado = $_POST["username"];
$passwordIngresada = $_POST["password"];


//
if (empty($usuarioIngresado) || empty($passwordIngresada)){

    header("Location: index.php?campoVacio=1");
    exit();
}