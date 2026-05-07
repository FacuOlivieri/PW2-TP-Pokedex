<?php
if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("location: indexAdmin.php");
    exit();
}

$id = (int) $_GET["id"];

$conexion = new mysqli("localhost", "root", "", "pokedex_pw2");

$statement = $conexion->prepare("SELECT * FROM pokemon WHERE id = ?");
$statement->bind_param("i", $id);
$statement->execute();
$resultado = $statement->get_result();
$pokemon = $resultado->fetch_assoc();

if (!$pokemon) {
    $statement->close();
    $conexion->close();
    header("location: indexAdmin.php");
    exit();
}

$tiposSeleccionados = explode(",", $pokemon["tipo"]);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Pokemon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/altaPokemon.css">
</head>
<body>
<div class="container mt-5 mb-5">
    <div class="table-container shadow-sm">
        <h1 class="mb-4">Editar a <?php echo htmlspecialchars($pokemon["nombre"]); ?></h1>

        <form action="actualizarPokemon.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $pokemon["id"]; ?>">
            <input type="hidden" name="imagen_actual" value="<?php echo htmlspecialchars($pokemon["imagen"]); ?>">

            <div class="mb-4">
                <label class="form-label fw-bold">Numero identificatorio</label>
                <input type="number" class="form-control" name="numero_identificador" value="<?php echo htmlspecialchars($pokemon["numero_identificador"]); ?>" placeholder="Ejemplo: 25" required>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Imagen del Pokemon</label>
                <input type="file" class="form-control" name="imagen">
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Nombre del Pokemon</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo htmlspecialchars($pokemon["nombre"]); ?>" placeholder="Ejemplo: Pikachu" required>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold d-block mb-3">Tipo de Pokemon</label>
                <div class="row">
                    <?php
                    $iconos = parse_ini_file("iconosTipoPokemon.ini");

                    foreach ($iconos as $tipo => $icono) {
                        $checked = in_array($tipo, $tiposSeleccionados) ? "checked" : "";

                        echo "<div class='col-md-3 mb-3'>";
                        echo "<label class='type-card'>";
                        echo "<img src='" . htmlspecialchars($icono) . "' class='type-icon' alt='" . htmlspecialchars($tipo) . "'>";
                        echo "<input type='checkbox' name='tipo[]' value='" . htmlspecialchars($tipo) . "' $checked><span>" . htmlspecialchars($tipo) . "</span>";
                        echo "</label>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Descripcion</label>
                <textarea class="form-control" rows="4" name="descripcion" placeholder="Descripcion del Pokemon..."><?php echo htmlspecialchars($pokemon["descripcion"]); ?></textarea>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Datos extras</label>
                <textarea class="form-control" rows="5" name="datos_extras" placeholder="Habilidades, curiosidades, altura, peso, evoluciones..."><?php echo htmlspecialchars($pokemon["datos_extras"]); ?></textarea>
            </div>

            <div class="d-flex justify-content-end gap-3">
                <a href="indexAdmin.php" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-success"><i class="bi bi-plus-circle"></i>Guardar Pokemon</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
<?php
$statement->close();
$conexion->close();
?>
