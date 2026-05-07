<?php

$numero_identificador = $_POST["numero_identificador"];
$nombre = $_POST["nombre"];
$imagen = $_FILES["imagen"];
$descripcion = $_POST["descripcion"];
$datos_extras = $_POST["datos_extras"];
$tipo = implode(",", $_POST["tipo"]);



//Conexión con BD
$conexion = new mysqli("localhost", "root", "", "pokedex_pw2");

/*
 * Poner validación de ERROR de CONEXIÓN CON BD ACA
 *
 */

$sql = "INSERT INTO pokemon (numero_identificador, imagen, nombre, tipo, descripcion, datos_extras) 
        VALUES ('$numero_identificador', '$imagen', '$nombre', '$tipo', '$descripcion', '$datos_extras')";



$conexion->query($sql);

$conexion->close();

header('location: indexAdmin.php');
exit();

/*
      //Preparación de Query para traer datos
      $query = $conexion->prepare("SELECT * FROM administrador WHERE usuario = ? AND contrasenia = ?");
      $query->bind_param("ss", $usuarioIngresado, $passwordIngresada);
      $query->execute();
      $result = $query->get_result();
      $datosAdmin = $result->fetch_assoc();*/
