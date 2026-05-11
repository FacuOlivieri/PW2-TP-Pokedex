<?php
// Header reutilizable
if(session_status() == PHP_SESSION_NONE){

    session_name("Admin_Pokedex");
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pokedex</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="css/styles.css">

    <!-- CSS altaPokemon -->
    <link rel="stylesheet" href="css/altaPokemon.css">

</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-custom py-3">
    <div class="container">

        <!-- Logo -->
        <div class="d-flex align-items-center gap-3">
            <div class="logo-box">Logo</div>