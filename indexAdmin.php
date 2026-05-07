<?php
    session_name("Admin_Pokedex");
    session_start();




?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-custom py-3">
    <div class="container">
        <!-- LOGO -->
        <div class="d-flex align-items-center gap-3">
            <div class="logo-box">Logo</div>
            <h1 class="title m-0">Pokedex</h1>
        </div>

        <!-- USUARIO + LOGOUT -->
        <div class="ms-auto d-flex align-items-center gap-3">

            <p class="admin-user m-0">
                Usuario ADMIN
            </p>

            <a href="logout.php" class="btn btn-outline-danger btn-sm">
                <i class="bi bi-box-arrow-right"></i>
                Logout
            </a>
        </div>
    </div>
</nav>



<!-- CONTENIDO -->
<div class="container mt-5">
    <!-- BUSCADOR -->
    <div class="search-section shadow-sm mb-4">

        <div class="row g-3 align-items-center">

            <div class="col-md-10">

                <input
                    type="text"
                    class="form-control form-control-lg"
                    placeholder="Ingrese el nombre, tipo o número del Pokémon"
                >

            </div>

            <div class="col-md-2 d-grid">

                <button class="btn btn-primary btn-lg">
                    ¿Quién es este Pokémon?
                </button>

            </div>

        </div>

    </div>

    <!-- TABLA -->
    <div class="table-container shadow-sm">

        <h3 class="mb-4">
            Administración de Pokémon
        </h3>

        <div class="table-responsive">

            <table class="table table-hover align-middle text-center">

                <thead class="table-dark">

                <tr>
                    <th>Imagen</th>
                    <th>Tipo</th>
                    <th>Número</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>

                </thead>

                <tbody>

                <!-- FILA -->
                <tr>

                    <td>
                        <img
                            src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/4.png"
                            class="pokemon-img"
                        >
                    </td>

                    <td>

                        <span class="badge bg-danger badge-type">
                            Fuego
                        </span>

                    </td>

                    <td>
                        #004
                    </td>

                    <td>
                        Charmander
                    </td>

                    <td>

                        <div class="d-flex justify-content-center gap-2">

                            <button class="btn btn-warning btn-sm text-white">
                                Modificar
                            </button>

                            <button class="btn btn-danger btn-sm">
                                Baja
                            </button>

                        </div>

                    </td>

                </tr>

                <!-- FILA -->
                <tr>

                    <td>
                        <img
                            src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/5.png"
                            class="pokemon-img"
                        >
                    </td>

                    <td>

                        <span class="badge bg-warning text-dark badge-type">
                            Fuego
                        </span>

                    </td>

                    <td>
                        #005
                    </td>

                    <td>
                        Charmeleon
                    </td>

                    <td>

                        <div class="d-flex justify-content-center gap-2">

                            <button class="btn btn-warning btn-sm text-white">
                                Modificar
                            </button>

                            <button class="btn btn-danger btn-sm">
                                Baja
                            </button>

                        </div>

                    </td>

                </tr>

                <!-- FILA -->
                <tr>

                    <td>
                        <img
                            src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/6.png"
                            class="pokemon-img"
                        >
                    </td>

                    <td>

                        <span class="badge bg-danger badge-type">
                            Fuego
                        </span>

                        <span class="badge bg-primary badge-type">
                            Volador
                        </span>

                    </td>

                    <td>
                        #006
                    </td>

                    <td>
                        Charizard
                    </td>

                    <td>

                        <div class="d-flex justify-content-center gap-2">

                            <button class="btn btn-warning btn-sm text-white">
                                Modificar
                            </button>

                            <button class="btn btn-danger btn-sm">
                                Baja
                            </button>

                        </div>

                    </td>

                </tr>

                </tbody>

            </table>

        </div>

    </div>

    <!-- BOTÓN NUEVO POKÉMON -->
    <div class="d-grid mt-4 mb-5">
        <a href="altaPokemon.php" class="btn btn-success btn-lg"><i class="bi bi-plus-circle"></i>Nuevo Pokémon</a>
    </div>

</div>
</body>
</html>