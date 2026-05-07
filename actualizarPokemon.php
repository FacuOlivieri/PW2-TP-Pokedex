<?php
$id = $_POST['id'];
$numero_identificador = $_POST["numero_identificador"];
$nombre = $_POST["nombre"];
$imagen = $_FILES["imagen"];
$descripcion = $_POST["descripcion"];
$datos_extras = $_POST["datos_extras"];
$tipo = implode(",", $_POST["tipo"]);

$conexion = new mysqli("localhost", "root", "", "pokedex_pw2");

$sql = "UPDATE pokemon SET 
        numero_identificador = '$numero_identificador',
        imagen = '$imagen',
        nombre = '$nombre', 
        tipo = '$tipo',
        descripcion = '$descripcion', 
        datos_extras = '$datos_extras',
        WHERE id = $id";

$conexion->query($sql);

$conexion->close();
header('location: indexAdmin.php');
exit();