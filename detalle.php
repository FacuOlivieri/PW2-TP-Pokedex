<?php
session_start();
include("config/bd.php");
include("includes/header.php");

// Mostrar listado de pokémon y búsqueda
include("includes/listadoYBusqueda.php");
$iconosGuardados = parse_ini_file("iconosTipoPokemon.ini");

if (isset ($_SESSION['Admin_Pokedex']) ) {
    include ("includes/frontLogout.php");
} else {
    include ("includes/frontLogin.php");
}

$id = $_GET["id"];

$statement = $conexion->prepare("SELECT * FROM pokemon WHERE id = ?");

$statement->bind_param("i", $id);

$statement->execute();
$resultado = $statement->get_result();
$pokemon = $resultado->fetch_assoc();

// ver si existe:
if (!$pokemon) {
    $statement->close();
    $conexion->close();
    exit();
}

$tiposSeleccionados = explode(",", $pokemon["tipo"]);
?>
<!-- CONTENIDO -->
<div class="container mt-5">

    <!-- TITULO -->
    <?php
    if (isset ($_SESSION['Admin_Pokedex']) ) {
        echo "<h1 class='main-title'>Administración de Pokemones</h1>";
    } else {
        echo "<h1 class='main-title'>Detalle de pokemon</h1>";
    }
    ?>

    <div class="container py-4">

        <!-- TABLA -->
        <div class="table-container shadow-sm">
            <div class="table-responsive">
                <!-- ITEM -->
                <div class="card card-item mb-4 shadow-sm">
                    <div class="row g-0">
                        <!-- Imagen -->
                        <div class="col-md-4">
                            <img src="<?php echo $pokemon["imagen"]; ?>" alt="Imagen" class="pokemon-detalle-img">
                        </div>
                        <!-- Información -->
                        <div class="col-md-8">
                            <div class="card-body h-100 d-flex flex-column">
                                <!-- Encabezado -->
                                <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                                    <h3 class="card-title m-0">
                                        <?php echo $pokemon["nombre"]; ?>
                                    </h3>
                                    <div class="tipos-detalle">
                                        <?php
                                        $tipos = explode(",", $pokemon["tipo"]);
                                        foreach ($tipos as $tipo) {
                                            $tipo = trim($tipo);
                                            if (isset($iconosGuardados[$tipo])) {
                                                echo "<span class='tipo-detalle'>";
                                                echo "<img src='" . htmlspecialchars($iconosGuardados[$tipo]) . "' class='icono-tipo-detalle' alt='" . "'>";
                                                echo "</span>";
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- Número -->
                                <p class="text-secondary mb-2">
                                    <strong>N° Identificador:</strong> <?php echo $pokemon["numero_identificador"]; ?>
                                </p>
                                <!-- Descripción -->
                                <h6 class="fw-bold">
                                    Descripcion
                                </h6>
                                <p class="card-text mb-3">
                                    <?php echo $pokemon["descripcion"]; ?>
                                </p>
                                <!-- Datos extra -->
                                <div class="mt-auto">
                                    <h6 class="fw-bold">
                                        Datos Extra
                                    </h6>
                                    <p class="mb-0 text-secondary">
                                        <?php echo $pokemon["datos_extras"]; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
<?php include("includes/footer.php"); ?>




