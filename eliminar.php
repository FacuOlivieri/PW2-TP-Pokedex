<?php
$id = $_GET['id'];

$conexion = new mysqli("localhost", "root", "", "pokedex_pw2");

$statement = $conexion->prepare("DELETE FROM pokemon WHERE id = ?");

$statement->bind_param("i", $id);

$statement->execute();

$statement->close();
$conexion->close();

header('location: indexAdmin.php');
exit();

