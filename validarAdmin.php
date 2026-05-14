<?php
include("config/bd.php");

session_start();

$usuarioIntroducido = $_POST["username"];
$passwordIntroducida = $_POST["password"];

if ($usuarioIntroducido == "" || $passwordIntroducida == "") {
    header("location: index.php?campoVacio=1");
    exit();
}

// Consulta
$sql = "SELECT contrasenia FROM administrador WHERE usuario = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $_POST['username']);
$stmt->execute();

$resultado = $stmt->get_result();

if ($fila = $resultado->fetch_assoc()) {

    //$passHash = $fila['contrasenia'];
    //if (password_verify($passwordIntroducida, $fila['contrasenia'])) {

    //Lo comento porque la contrasenia en BD no esta hasheada




    if ($passwordIntroducida == $fila['contrasenia']) {
        $_SESSION['Admin_Pokedex'] = "valido";
        $_SESSION['usuario'] = $usuarioIntroducido;

        header("Location: index.php");
        exit();
    }
}

header("Location: index.php?credencialesIncorrectas=1");
exit();
?>


/*
$usuarioIngresado = $_POST["username"];
$passwordIngresada = $_POST["password"];

    //Conexión con BD
    $conexion = new mysqli("localhost", "root", "", "pokedex_pw2");

    /*
     * Poner validación de ERROR de CONEXIÓN CON BD ACA
     *
     */
/*
      //Preparación de Query para traer datos
      $query = $conexion->prepare("SELECT * FROM administrador WHERE usuario = ? AND contrasenia = ?");
      $query->bind_param("ss", $usuarioIngresado, $passwordIngresada);
      $query->execute();
      $result = $query->get_result();
      $datosAdmin = $result->fetch_assoc();

/*
      //Validación de datos según lo ingresado con los datos de la BD
      if ($usuarioIngresado != $datosAdmin["usuario"] && $passwordIngresada != $datosAdmin["password"]) {
          header("Location: index.php?credencialesIncorrectas=1");
          exit();
      }

/*
    //Validación de Campo Vacíos
    if (empty($usuarioIngresado) || empty($passwordIngresada)){
        header("Location: index.php?campoVacio=1");
        exit();
    }
*/





