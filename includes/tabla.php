
<table class="table table-hover align-middle text-center">
    <thead class="table-dark">
    <tr>
        <th>Imagen</th>
        <th>Tipo</th>
        <th>Número</th>
        <th>Nombre</th>
        <?php
        if (isset ($_SESSION['Admin_Pokedex']) ) {
            echo "<th>Acciones</th>";
        } else {
            echo "<th>Detalle</th>";
        }
        ?>
    </tr>
    </thead>
    <tbody>


<?php
//Obtener y procesar los resultados
if ($resultado->num_rows > 0) {
    while ( $pokemon = $resultado->fetch_assoc() ) {

        echo "<tr>";
        echo "<td> <img src='" . $pokemon['imagen'] . "'class='pokemon-img'> </td>";

        // TIPOS
        $tipos = explode(",", $pokemon['tipo']);
        echo "<td>";

        foreach ($tipos as $tipo) {
            if (isset ($iconosGuardados [$tipo] ) ) {
                echo "<img src='" . $iconosGuardados[$tipo] . "' class='iconos-tabla' alt='$tipo'>";
            }
        }
        echo "</td>";
        echo "<td>" . $pokemon["numero_identificador"] . "</td>";
        echo "<td>" . $pokemon["nombre"] . "</td>";
        if (isset ($_SESSION['Admin_Pokedex']) ) {
            echo "<td>
                  <div class='actions'>
                    <a href='detalle.php?id=" . $pokemon['id'] . "'class='btn btn-primary btn-sm'>Ver</a>
                    <a href='editar.php?id=" . $pokemon["id"] . "' class='edit'> Editar </a>
                    <a href='eliminar.php?id=" . $pokemon["id"] . "' class='delete'onclick=\"return confirm('¿Eliminar pokemon?')\"> Eliminar </a>
                  </div>
                        </td>";
        } else {
            echo "<td> <a href='detalle.php?id=" . $pokemon['id'] . "'class='btn btn-primary btn-sm'>Ver</a></td>";
        }

        echo "</tr>";
    }
} else {
    // 'colspan' hace que ocupe toda la columna (son 4)
    echo "<tr> <td colspan='5'> Pokemon no encontrado </td> </tr>";
}

?>
    </tbody>
</table>