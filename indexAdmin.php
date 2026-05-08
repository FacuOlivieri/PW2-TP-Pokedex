<?php
    session_name("Admin_Pokedex");
    session_start();

    //Conectar con el servidor de bases de datos y
    //Seleccionar una base de datos
    $conexion = new mysqli("localhost", "root", "", "pokedex_pw2");

    //Enviar la instrucción SQL a la base de datos
    $resultado = $conexion->query("SELECT * FROM pokemon");

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
                    echo "<td>
                         <div class='actions'>
                         <a href='editar.php?id=" . $pokemon["id"] . "' class='edit'>Editar</a>
                         <a href='eliminar.php?id=" . $pokemon["id"] . "' class='delete'>Eliminar</a>
                         </div>
                         </td>";
                    echo "</tr>";
                }
                ?>
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