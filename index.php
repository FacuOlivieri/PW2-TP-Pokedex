<?php
    if (session_status() == PHP_SESSION_NONE) {}

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
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-custom py-3">
    <div class="container">

        <!-- Logo -->
        <div class="d-flex align-items-center gap-3">
            <div class="logo-box">Logo</div>
            <h1 class="title m-0">Pokedex</h1>
        </div>

        <!-- CONTENEDOR LOGIN -->
        <div class="d-flex flex-column align-items-end ms-auto">

            <!-- FORM -->
            <form action="validarAdmin.php" class="d-flex gap-2" method="post">
                <input type="text" class="form-control" placeholder="Usuario" name="username">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <input class="btn btn-danger" type="submit" value="Ingresar">
            </form>

            <?php

            $userid = uniqid("user_",true);

            setcookie("adminPokemon",$userid,time()+3600);


            if (isset($_GET["campoVacio"])) {
                echo "
                        <p class='login-warning'>
                            <i class='bi bi-exclamation-circle'></i>
                            Ningún campo debe quedar vacío
                        </p>
                    ";
            }
            if (isset($_GET["credencialesIncorrectas"])) {
            echo "<p class='login-warning'>
                  <i class='bi bi-exclamation-circle'></i>
                  Usuario o contraseña incorrectos
                  </p>";
            }

            ?>
        </div>

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
