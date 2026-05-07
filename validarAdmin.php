<?php

$usuarioIngresado = $_POST["username"];
$passwordIngresada = $_POST["password"];

    //Conexión con BD
    $conexion = new mysqli("localhost", "root", "", "pokedex_pw2");

    /*
     * Poner validación de ERROR de CONEXIÓN CON BD ACA
     *
     */

      //Preparación de Query para traer datos
      $query = $conexion->prepare("SELECT * FROM administrador WHERE usuario = ? AND contrasenia = ?");
      $query->bind_param("ss", $usuarioIngresado, $passwordIngresada);
      $query->execute();
      $result = $query->get_result();
      $datosAdmin = $result->fetch_assoc();


      //Validación de datos según lo ingresado con los datos de la BD
      if ($usuarioIngresado != $datosAdmin["usuario"] && $passwordIngresada != $datosAdmin["password"]) {
          header("Location: index.php?credencialesIncorrectas=1");
          exit();
      }


    //Validación de Campo Vacíos
    if (empty($usuarioIngresado) || empty($passwordIngresada)){
        header("Location: index.php?campoVacio=1");
        exit();
    }

    header("Location: indexAdmin.php");

    $query->close();
    $conexion->close();

