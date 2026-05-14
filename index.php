<?php
session_start();
include("config/bd.php");
include("includes/header.php");
include("includes/navbar.php");

// Mostrar listado de pokémon y búsqueda
include("includes/listadoYBusqueda.php");

$iconosGuardados = parse_ini_file("iconosTipoPokemon.ini");
// includes/header.php

?>


<!-- CONTENIDO -->
<div class="container mt-5">

    <!-- TITULO -->
    <?php
    if (isset ($_SESSION['Admin_Pokedex']) ) {
        echo "<h1 class='main-title'>Administración de Pokemones</h1>";
    } else {
        echo "<h1 class='main-title'>Listado de Pokemones</h1>";
    }
    ?>

    <!-- BUSCADOR -->
    <form method="GET" class="search-section shadow-sm mb-4">
        <div class="row g-3">
            <div class="col-md-10">
                <input type="text" name="buscar" class="form-control form-control-lg search-input"
                        placeholder="Ingrese el nombre, tipo o número del Pokémon"
                        value="<?php echo $buscar; ?>">
            </div>
            <div class="col-md-2 d-grid">
                <button class="btn btn-primary btn-lg search-btn">¿Quién es este Pokémon?</button>
            </div>
        </div>
    </form>

    <!-- TABLA -->
    <div class="table-container shadow-sm">
        <h3 class="section-title">Lista de Pokemones</h3>
        <div class="table-responsive">
            <?php
            include("includes/tabla.php");
            ?>
        </div>
    </div>

    <?php
    if (isset ($_SESSION['Admin_Pokedex']) ) {
        include("includes/botonAgregarPokemon.php");
    }
    ?>

</div>
<?php include("includes/footer.php"); ?>
