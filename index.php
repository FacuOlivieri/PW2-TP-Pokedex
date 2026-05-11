<?php
include("config/bd.php");
include("includes/header.php");

//si es admin, entonces:
if (isset ($_SESSION['admin']) ) {
    header("location: indexAdmin.php");
    exit();
}

// Mostrar listado de pokémon y búsqueda
$buscar = "";

if (isset($_GET['buscar'])) {
    $buscar = $_GET['buscar'];
}

if ($buscar != "" ) {
    // 'prepare' para que no se rompa consulta
    $statement = $conexion->prepare("
        SELECT * FROM pokemon WHERE nombre 
        LIKE ? OR
        tipo LIKE ? OR 
        numero_identificador LIKE ?");
    
    $textoBusqueda = "%$buscar%";
 
    // sss = string, string, string
    $statement->bind_param("sss", $textoBusqueda, $textoBusqueda, $textoBusqueda);

    $statement->execute();
    $resultado = $statement->get_result();

} else {
    $resultado = $conexion->query("SELECT * FROM pokemon");
}

$iconosGuardados = parse_ini_file("iconosTipoPokemon.ini");
?>

// includes/header.php
<!-- NAVBAR -->
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

                echo "<p class='login-warning'>
                    <i class='bi bi-exclamation-circle'> </i>
                    Ningún campo debe quedar vacío
                </p>";
            }
            if (isset($_GET["credencialesIncorrectas"])) {

                echo "<p class='login-warning'>
                    <i class='bi bi-exclamation-circle'> </i>
                    Usuario o contraseña incorrectos
                </p>";
            }
            ?>
            </div>
                <h1 class="title m-0">Pokedex</h1>
            </div>
        </div>
    </div>
</nav>

<!-- CONTENIDO -->
<div class="container mt-5">

    <!-- BUSCADOR -->
    <form method="GET" class="search-section shadow-sm mb-4">

        <div class="row g-3">

            <div class="col-md-10">

                <input 
                    type="text" 
                    class="form-control form-control-lg"   
                    placeholder="Ingrese el nombre, tipo o número del Pokémon"
                    value="<?php echo $buscar; ?>
                ">
            
            </div>

            <div class="col-md-2 d-grid">

                <button class="btn btn-primary btn-lg">
                    ¿Quién es este Pokémon?
                </button>

            </div>
        </div>
    </form>

    <!-- TABLA -->
    <div class="table-container shadow-sm">

        <h3 class="mb-4"> Lista de Pokemones </h3>

        <div class="table-responsive">
            <table class="table table-hover align-middle text-center">
                <thead class="table-dark">
                <tr>
                    <th>Imagen</th>
                    <th>Tipo</th>
                    <th>Número</th>
                    <th>Nombre</th>
                    <th>Detalle</th>
                </tr>
                </thead>

                <tbody>

                <?php
                //Obtener y procesar los resultados
                if ($resultado->num_rows > 0) {
                    while ( $pokemon = $resultado->fetch_assoc() ) {

                        echo "<tr>";
                        echo "<td> <img src='" . $pokemon['imagen'] . "' 
                                class='pokemon-img'> </td>";

                        // TIPOS
                        $tipos = explode(",", $pokemon['tipo']);
                        echo "<td>";

                        foreach ($tipos as $tipo) {
                            if (isset ($iconosGuardados [$tipo] ) ) {
                                echo "<img src='" . $iconosGuardados[$tipo] . "' 
                                    class='iconos-tabla' alt='$tipo'>";
                        }
                    }
                    echo "</td>";
                    echo "<td>" . $pokemon["numero_identificador"] . "</td>";
                    echo "<td>" . $pokemon["nombre"] . "</td>";
                    echo "<td>
                            <a href='detalle.php?id=" . $pokemon['id'] . "'
                            class='btn btn-primary btn-sm'>
                            Ver
                            </a>
                        </td>";
                    echo "</tr>";
                    }
                } else {
                    // 'colspan' hace que ocupe toda la columna (son 4)
                    echo "<tr> <td colspan='5'> Pokemon no encontrado </td> </tr>";
                }
                
                ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>
