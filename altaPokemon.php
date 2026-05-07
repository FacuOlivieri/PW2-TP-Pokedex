<?php




?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Pokémon</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/altaPokemon.css">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-custom py-3">

    <div class="container">
        <!-- LOGO -->
        <div class="d-flex align-items-center gap-3">
            <div class="logo-box">Logo</div>
            <h1 class="title m-0">Alta Pokémon</h1>
        </div>

        <!-- BOTÓN VOLVER -->
        <div class="ms-auto">
            <a href="indexAdmin.php" class="btn btn-outline-primary"><i class="bi bi-arrow-left"></i>Volver</a>
        </div>
    </div>
</nav>

<!-- CONTENIDO -->
<div class="container mt-5 mb-5">

    <div class="table-container shadow-sm">
        <h3 class="mb-4">Nuevo Pokémon</h3>

        <form action="guardarPokemon.php" method="post" enctype="multipart/form-data">

            <!-- NÚMERO -->
            <div class="mb-4">
                <label class="form-label fw-bold">Número identificatorio</label>
                <input type="number" class="form-control" name="numero_identificador" placeholder="Ejemplo: 25" required>
            </div>

            <!-- IMAGEN -->
            <div class="mb-4">
                <label class="form-label fw-bold">Imagen del Pokémon</label>
                <input type="file" class="form-control" name="imagen">
            </div>

            <!-- NOMBRE -->
            <div class="mb-4">
                <label class="form-label fw-bold">Nombre del Pokémon</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ejemplo: Pikachu" required>
            </div>

            <!-- TIPOS -->
            <div class="mb-4">
                <label class="form-label fw-bold d-block mb-3">Tipo de Pokémon</label>
                <div class="row">
                    <?php
                    $iconos = parse_ini_file("iconosTipoPokemon.ini");

                    foreach ($iconos as $tipo => $icono) {
                        echo "<div class='col-md-3 mb-3'>";
                        echo "<label class='type-card'>";
                        echo "<img src=$icono class='type-icon' alt='Fuego'>";
                        echo "<input type='checkbox' name='tipo[]' value=$tipo><span>$tipo</span>";
                        echo "</label>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>

            <!-- DESCRIPCIÓN -->
            <div class="mb-4">
                <label class="form-label fw-bold">Descripción</label>
                <textarea class="form-control" rows="4" name="descripcion" placeholder="Descripción del Pokémon..."></textarea>
            </div>

            <!-- DATOS EXTRAS -->
            <div class="mb-4">
                <label class="form-label fw-bold">Datos extras</label>
                <textarea class="form-control" rows="5" name="datos_extras" placeholder="Habilidades, curiosidades, altura, peso, evoluciones..."></textarea>
            </div>

            <!-- BOTONES -->
            <div class="d-flex justify-content-end gap-3">
                <a href="indexAdmin.php" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-success"><i class="bi bi-plus-circle"></i>Guardar Pokémon</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
<?php
?>

