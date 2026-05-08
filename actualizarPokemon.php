<?php
$id = $_POST['id'];
$numero_identificador = $_POST["numero_identificador"];
$nombre = $_POST["nombre"];


$imagen = $_FILES["imagen"];
if ($imagen["erro"] == 0) {
    $rutaImagen = "imagenes/pokemon/" . $imagen["name"];
    move_uploaded_file($imagen["tmp_name"], $rutaImagen);
}
//Hay que borrar la imagen que se supone que reemplaza de los archivos

$descripcion = $_POST["descripcion"];
$datos_extras = $_POST["datos_extras"];
$tipo = implode(",", $_POST["tipo"]);

$conexion = new mysqli("localhost", "root", "", "pokedex_pw2");

$sql = "UPDATE pokemon SET 
        numero_identificador = '$numero_identificador',
        imagen = '$rutaImagen',
        nombre = '$nombre', 
        tipo = '$tipo',
        descripcion = '$descripcion', 
        datos_extras = '$datos_extras'
        WHERE id = $id";

$conexion->query($sql);

$conexion->close();
header('location: indexAdmin.php');
exit();