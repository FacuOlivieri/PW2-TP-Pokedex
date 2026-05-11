<?php
// Actualizar Pokémon
include("config/bd.php");
session_start();

// Verificar admin
if(!isset($_SESSION['Admin_Pokedex'])){
    header("Location: index.php");
    exit();
}

// VALIDAR ID
if(!isset($_POST['id'])){
    header("Location: indexAdmin.php");
    exit();
}

$id = $_POST['id'];
$numero_identificador = $_POST["numero_identificador"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$datos_extras = $_POST["datos_extras"];

// tipo
//Hay que borrar la imagen que se supone que reemplaza de los archivos

$tipo = "";
if (isset ($_POST ["tipo"] ) ) {
    $tipo = implode(",", $_POST["tipo"] );
}

// imagen
$imagenActual = $_POST["imagen_actual"];
$rutaImagen = $imagenActual;

if(isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0) {
        
    $imagen = $_FILES["imagen"];
    $rutaImagen = "imagenes/pokemon/" . $imagen["name"];
    move_uploaded_file($imagen["tmp_name"], $rutaImagen);
}

// actualizacion: 

$statement = $conexion->prepare("
    UPDATE pokemon 
    SET numero_identificador = ?,
    imagen = ?,
    nombre = ?,
    tipo = ?,
    descripcion = ?,
    datos_extras = ? WHERE id = ?
");

$statement->bind_param(
    "isssssi",
    $numero_identificador,
    $rutaImagen,
    $nombre,
    $tipo,
    $descripcion,
    $datos_extras,
    $id
);

$statement->execute();

$statement->close();
$conexion->close();

header("Location: indexAdmin.php");
exit();
?>
