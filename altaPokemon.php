<?php
session_start();

if (!isset($_SESSION['Admin_Pokedex'])) {
    header("location: index.php");
    exit();
}

include("config/bd.php");
include("includes/header.php");
?>

<h1 class="title m-0">Alta Pokemon</h1>
</div>

<div class="ms-auto">
    <a href="indexAdmin.php" class="btn btn-outline-primary">
        <i class="bi bi-arrow-left"> </i>
        Volver
    </a>
</div>
</div>
</nav>

<div class="container mt-5 mb-5">
    <div class="table-container shadow-sm">
        <h3 class="mb-4">Nuevo Pokemon</h3>

        <form action="guardarPokemon.php" method="post" enctype="multipart/form-data">
            <div class="mb-4">
                <label class="form-label fw-bold">Número identificatorio</label>
                <input type="number" class="form-control" name="numero_identificador" placeholder="Ejemplo: 25" required>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Imagen del Pokemon</label>
                <input type="file" class="form-control" name="imagen">
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Nombre del Pokemon</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ejemplo: Pikachu" required>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold d-block mb-3">Tipo de Pokemon</label>
                <div class="row">
                    <?php
                    $iconos = parse_ini_file("iconosTipoPokemon.ini");

                    foreach ($iconos as $tipo => $icono) {
                        echo "<div class='col-md-3 mb-3'>";
                        echo "<label class='type-card'>";
                        echo "<img src='$icono' class='type-icon' alt='$tipo'>";
                        echo "<input type='checkbox' name='tipo[]' value='$tipo'><span>$tipo</span>";
                        echo "</label>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Descripción</label>
                <textarea class="form-control" rows="4" name="descripcion" placeholder="DescripciÃ³n del PokÃ©mon..."></textarea>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Datos extras</label>
                <textarea class="form-control" rows="5" name="datos_extras" placeholder="Habilidades, curiosidades, altura, peso, evoluciones..."></textarea>
            </div>

            <div class="d-flex justify-content-end gap-3">
                <a href="indexAdmin.php" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i>
                    Guardar Pokemon
                </button>
            </div>
        </form>
    </div>
</div>

<?php include("includes/footer.php"); ?>
