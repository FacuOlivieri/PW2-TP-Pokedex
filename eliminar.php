<?php
// Eliminar pokémon
include("config/bd.php");
session_start();

$id = $_GET['id'];

$statement = $conexion->prepare("DELETE FROM pokemon WHERE id = ?");

$statement->bind_param("i", $id);

$statement->execute();

$statement->close();
$conexion->close();

header('location: indexAdmin.php');
exit();
?>
