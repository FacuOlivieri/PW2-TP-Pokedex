<?php
$conexion = new mysqli("localhost", "root", "", "pokedex_pw2");
$resultado = $conexion->query("SELECT * FROM pokemon");


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
        <h3 class="mb-4">
            Lista de Pokemones
        </h3>

        <div class="table-responsive">
            <table class="table table-hover align-middle text-center">
                <thead class="table-dark">
                <tr>
                    <th>Imagen</th>
                    <th>Tipo</th>
                    <th>Número</th>
                    <th>Nombre</th>
                </tr>
                </thead>

                <tbody>
                <?php
                //Obtener y procesar los resultados
                $iconosGuardados = parse_ini_file("iconosTipoPokemon.ini");

                while ( $pokemon = $resultado->fetch_assoc() ) {
                    echo "<tr>";
                    echo "<td><img src='" . $pokemon['imagen'] . "' class='pokemon-img'></td>";

                    // TIPOS
                    $tipos = explode(",", $pokemon['tipo']);
                    echo "<td>";
                    foreach ($tipos as $tipo) {
                        if (isset($iconosGuardados[$tipo])) {
                            echo "<img src='" . $iconosGuardados[$tipo] . "' class='iconos-tabla' alt='$tipo'>";
                        }
                    }
                    echo "</td>";
                    echo "<td>" . $pokemon["numero_identificador"] . "</td>";
                    echo "<td>" . $pokemon["nombre"] . "</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>

            </table>

        </div>

    </div>
</div>
</body>
</html>
