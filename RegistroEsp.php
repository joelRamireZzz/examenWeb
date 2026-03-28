<?php
include("conexion.php");

if($_POST){
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $nombreImagen = $_FILES['icono']['name'];
    $rutaTemporal = $_FILES['icono']['tmp_name'];
    $carpetaDestino = "imagenes/" . $nombreImagen;

    if($nombreImagen != ""){
        move_uploaded_file($rutaTemporal, $carpetaDestino);
    }

    $sql = "INSERT INTO especialidades (nombre, descripcion, icono)
            VALUES ('$nombre', '$descripcion', '$nombreImagen')";

    $conexion->query($sql);

    header("Location: Directorio.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Especialidad</title>
    <link rel="stylesheet" href="styleDirectorio.css">
</head>
<body>
    <h1>Registrar Especialidad</h1>
    <form method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nombre:</td>
                <td><input type="text" name="nombre" required></td>
            </tr>
            <tr>
                <td>Descripción:</td>
                <td><input type="text" name="descripcion" required></td>
            </tr>
            <tr>
                <td>Icono:</td>
                <td><input type="file" name="icono"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button class="boton-registrar">Registrar</button>
                    <a href="Directorio.php">Regresar</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
