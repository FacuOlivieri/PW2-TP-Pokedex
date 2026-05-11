<?php
// Modificar pokémon
include("config/bd.php");
include("includes/header.php");

// Verificar admin:
if(!isset($_SESSION['admin'])){
    header("Location: index.php");
    exit();
}

// verificar id:
if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("location: indexAdmin.php");
    exit();
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
    header("location: indexAdmin.php");
    exit();
}

$tiposSeleccionados = explode(",", $pokemon["tipo"]);
?>

<div class="container mt-5 mb-5">
    <div class="table-container shadow-sm">

        <h1 class="mb-4"> 
            Editar a 
            <?php 
            echo htmlspecialchars($pokemon ["nombre"] ); 
            ?>
        </h1>

        <form action="actualizarPokemon.php" 
            method="post" 
            enctype="multipart/form-data">

            // id:
            <input type="hidden" 
                name="id" 
                value="<?php echo $pokemon["id"]; ?>
            ">

            // imagen actual:
            <input type="hidden" 
                name="imagen_actual"
                value="<?php echo htmlspecialchars($pokemon ["imagen"] ); ?>
            ">

            // numero:
            <div class="mb-4">
                <label class="form-label fw-bold"> Numero identificatorio </label>
                
                <input 
                    type="number" 
                    class="form-control" 
                    name="numero_identificador" 
                    value="<?php echo htmlspecialchars($pokemon ["numero_identificador"] ); ?>" 
                    placeholder="Ejemplo: 25" 
                    required
                >
            </div>

            // imagen
            <div class="mb-4">
                <label class="form-label fw-bold"> Imagen del Pokemon </label>
                <img src="<?php echo $pokemon['imagen']; ?>" width="250" class="rounded shadow mb-3">
                <input type="file" class="form-control" name="imagen">
            </div>

            // nombre
            <div class="mb-4">
                <label class="form-label fw-bold"> Nombre del Pokemon </label>

                <input 
                    type="text" 
                    class="form-control" 
                    name="nombre" 
                    value="<?php echo htmlspecialchars($pokemon["nombre"]); ?>" 
                    placeholder="Ejemplo: Pikachu" 
                    required
                >
            </div>

            // tipo
            <div class="mb-4">
                <label class="form-label fw-bold d-block mb-3"> Tipo de Pokemon </label>

                <div class="row">

                    <?php
                    $iconos = parse_ini_file("iconosTipoPokemon.ini");

                    foreach ($iconos as $tipo => $icono) {
                        $checked = in_array($tipo, $tiposSeleccionados) ? "checked" : "";

                        echo "<div class='col-md-3 mb-3'>
                                <label class='type-card'
                                <img src='$icono' class='type-icon' alt='$tipo'>

                                <input type='checkbox' name='tipo[]' value='$tipo' $checked> 
                                <span>$tipo</span>

                                </label>
                            </div>
                        ";
                    }
                    ?>
                </div>
            </div>

            // descripcion:
            <div class="mb-4">
                <label class="form-label fw-bold"> Descripcion </label>

                <textarea class="form-control" 
                    rows="4" 
                    name="descripcion" 
                    placeholder="Descripcion del Pokemon...">
                    <?php 
                        echo htmlspecialchars($pokemon["descripcion"]); 
                    ?>
                </textarea>
            </div>

            // datos extra
            <div class="mb-4">
                <label class="form-label fw-bold"> Datos extras </label>

                <textarea class="form-control" 
                    rows="5" 
                    name="datos_extras" 
                    placeholder="Habilidades, curiosidades, altura, peso, evoluciones...">
                    <?php 
                        echo htmlspecialchars($pokemon["datos_extras"]); 
                    ?>
                </textarea>
            </div>

            // botones
            <div class="d-flex justify-content-end gap-3">
                <a href="indexAdmin.php" class="btn btn-secondary"> Cancelar </a>
                
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-plus-circle"> </i>
                    Guardar Pokemon
                </button>
            </div>
        </form>
    </div>
</div>
<?php 
include("includes/footer.php"); 

$statement->close();
$conexion->close();
?>
