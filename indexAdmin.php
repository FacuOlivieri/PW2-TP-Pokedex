<?php
// PÃ¡gina principal del administrador logueado
// Permite ver, editar, eliminar y agregar pokÃ©mon
session_start();

if (!isset($_SESSION['Admin_Pokedex'])) {
    header("location: index.php");
    exit();
}

include("config/bd.php");
include("includes/header.php");

$buscar = "";

if (isset($_GET['buscar'])) {
    $buscar = $_GET['buscar'];
}

if ($buscar != "") {
    $statement = $conexion->prepare("
        SELECT * FROM pokemon
        WHERE nombre LIKE ?
        OR tipo LIKE ?
        OR numero_identificador LIKE ?
    ");

    $textoBusqueda = "%$buscar%";
    $statement->bind_param("sss", $textoBusqueda, $textoBusqueda, $textoBusqueda);
    $statement->execute();
    $resultado = $statement->get_result();
} else {
    $resultado = $conexion->query("SELECT * FROM pokemon");
}

$iconosGuardados = parse_ini_file("iconosTipoPokemon.ini");
?>

<h1 class="title m-0">Pokedex</h1>
</div>

<div class="ms-auto d-flex align-items-center gap-3">
    <p class="admin-user m-0">Usuario ADMIN</p>
    <a href="logout.php" class="btn btn-outline-danger btn-sm">
        <i class="bi bi-box-arrow-right"></i>
        Logout
    </a>
</div>
</div>
</nav>

<div class="container mt-5">
    <h1 class="mb-4">Administracion Pokedex</h1>

    <form method="GET" class="search-section shadow-sm mb-4">
        <div class="row g-3">
            <div class="col-md-10">
                <input
                    type="text"
                    class="form-control form-control-lg"
                    name="buscar"
                    placeholder="Ingrese el nombre, tipo o número del Pokemon"
                    value="<?php echo htmlspecialchars($buscar); ?>">
            </div>

            <div class="col-md-2 d-grid">
                <button class="btn btn-primary btn-lg">
                    ¿Quién és este Pokemon?
                </button>
            </div>
        </div>
    </form>

    <div class="table-container shadow-sm">
        <h3 class="mb-4">Administración de Pokemon</h3>

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
                    if ($resultado->num_rows > 0) {
                        while ($pokemon = $resultado->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td><img src='" . $pokemon['imagen'] . "' class='pokemon-img'></td>";

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
                                        <a href='detalle.php?id=" . $pokemon['id'] . "' class='btn btn-primary btn-sm'>Ver</a>
                                        <a href='editar.php?id=" . $pokemon["id"] . "' class='edit'>Editar</a>
                                        <a href='eliminar.php?id=" . $pokemon["id"] . "' class='delete' onclick=\"return confirm('Â¿Eliminar pokemon?')\">Eliminar</a>
                                    </div>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'> Pokemon no encontrado </td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-grid mt-4 mb-5">
        <a href="altaPokemon.php" class="btn btn-success btn-lg">
            <i class="bi bi-plus-circle"> </i>
            Nuevo Pokemon
        </a>
    </div>
</div>

<?php include("includes/footer.php"); ?>
