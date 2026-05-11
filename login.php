<?php
// Login administrador usando sesiones
include("config/db.php");
include("includes/header.php");

// Si ya inició sesión
if(isset($_SESSION['admin'])){

    header("Location: adminIndex.php");
    exit();
}
// sino:
if($_POST) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Validar campos vacíos
    if($usuario == "" || $password == ""){
        echo "<div class='alert alert-danger'> Complete todos los campos </div>";
    } else {
        
        $statement = $conexion->prepare("
            SELECT * FROM usuarios
            WHERE usuario = ?
            AND password = ? 
        ");

        $statement->bind_param("ss", $usuario, $password);

        $statement->execute();
        $resultado = $statement->get_result();

        // Verificar usuario
        if ($resultado->num_rows > 0) {
            $_SESSION['admin'] = $usuario;

            header("Location: indexAdmin.php");
            exit();
        } else {
            echo "<div class='alert alert-danger'> Los datos son incorrectos </div>";
        }
    }
}
?>

<h1 class="mb-4"> Login </h1>

<form method="POST">
    <input type="text" name="usuario" placeholder="Usuario" class="form-control mb-3">
    <input type="password" name="password" placeholder="password" class="form-control mb-3">
    <button class="btn btn-success"> Iniciar sesion </button>
</form>

<?php include("includes/footer.php"); ?>