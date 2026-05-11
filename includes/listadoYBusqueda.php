<?php
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
?>
