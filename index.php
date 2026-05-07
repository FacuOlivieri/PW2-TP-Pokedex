<?php
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
    <link rel="stylesheet" href="styles.css">


    <style>
        body {
            background-color: #f5f5f5;
        }

        .navbar-custom {
            background-color: white;
            border-bottom: 2px solid #dcdcdc;
        }

        .logo-box {
            width: 70px;
            height: 70px;
            border: 2px dashed #999;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            background-color: #fafafa;
        }

        .title {
            font-size: 2rem;
            font-weight: bold;
        }

        .search-section {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
        }

        .table-container {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
        }

        .pokemon-img {
            width: 70px;
            height: 70px;
            object-fit: contain;
        }

        .badge-type {
            font-size: 0.9rem;
            padding: 8px 12px;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-custom py-3">
    <div class="container">

        <!-- Logo -->
        <div class="d-flex align-items-center gap-3">
            <div class="logo-box">
                Logo
            </div>

            <h1 class="title m-0">Pokedex</h1>
        </div>

        <!-- Login -->
        <form class="d-flex gap-2 ms-auto">

            <input type="text" class="form-control" placeholder="Usuario">

            <input type="password" class="form-control" placeholder="Password">

            <button class="btn btn-danger">
                Ingresar
            </button>

        </form>

    </div>
</nav>

<!-- CONTENIDO -->
<div class="container mt-5">

    <!-- BUSCADOR -->
    <div class="search-section shadow-sm mb-4">

        <div class="row g-3">

            <div class="col-md-10">
                <input type="text" class="form-control form-control-lg"
                       placeholder="Ingrese el nombre, tipo o número del Pokémon">
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

        <h3 class="mb-4">Listado de Pokémon</h3>

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

                <tr>
                    <td>
                        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/4.png"
                             class="pokemon-img">
                    </td>
                    <td>
                        <span class="badge bg-danger badge-type">
                            Fuego
                         </span>
                    </td>
                    <td>#004</td>
                    <td>Charmander</td>
                    <td>
                        <button class="btn btn-outline-primary btn-sm">
                            Ver detalle
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/5.png"
                             class="pokemon-img">
                    </td>
                    <td>
                                <span class="badge bg-warning text-dark badge-type">
                                    Fuego
                                </span>
                    </td>
                    <td>#005</td>
                    <td>Charmeleon</td>
                    <td>
                        <button class="btn btn-outline-primary btn-sm">
                            Ver detalle
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/6.png"
                             class="pokemon-img">
                    </td>
                    <td>
                                <span class="badge bg-danger badge-type">
                                    Fuego
                                </span>
                        <span class="badge bg-primary badge-type">
                                    Volador
                                </span>
                    </td>
                    <td>#006</td>
                    <td>Charizard</td>
                    <td>
                        <button class="btn btn-outline-primary btn-sm">
                            Ver detalle
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/25.png"
                             class="pokemon-img">
                    </td>
                    <td>
                        <span class="badge bg-warning text-dark badge-type">
                            Eléctrico
                        </span>
                    </td>
                    <td>#025</td>
                    <td>Pikachu</td>
                    <td>
                        <button class="btn btn-outline-primary btn-sm">
                            Ver detalle
                        </button>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
