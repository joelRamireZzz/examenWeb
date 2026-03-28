<?php
include("conexion.php");
$id = $_GET['id'];

$especialidad = $conexion->query("SELECT * FROM especialidades WHERE id_especialidad = $id");
$datos = $especialidad->fetch_assoc();

if($_POST)
    {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $nombreImagen = $_FILES['icono']['name'];
    $rutaTemporal = $_FILES['icono']['tmp_name'];
    if($nombreImagen != ""){
        $carpetaDestino = "imagenes/" . $nombreImagen;
        move_uploaded_file($rutaTemporal, $carpetaDestino);

        $sql = "UPDATE especialidades SET nombre='$nombre', descripcion='$descripcion', icono='$nombreImagen' WHERE id_especialidad=$id";
        } 
        else 
        {
            $sql = "UPDATE especialidades SET nombre='$nombre', descripcion='$descripcion' WHERE id_especialidad=$id";
        }
        $conexion->query($sql);
        header("Location: Directorio.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Especialidad</title>
    <link rel="stylesheet" href="styleDirectorio.css">
</head>
<body>
    <h1>Editar Especialidad</h1>
    <form method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nombre:</td>
                <td><input type="text" name="nombre" value="<?php echo $datos['nombre']; ?>"></td>
            </tr>
            <tr>
                <td>Descripción:</td>
                <td><input type="text" name="descripcion" value="<?php echo $datos['descripcion']; ?>"></td>
            </tr>
            <tr>
                <td>Icono actual:</td>
                <td>
                    <img src="imagenes/<?php echo $datos['icono']; ?>" width="40">
                </td>
            </tr>
            <tr>
                <td>Nuevo icono:</td>
                <td><input type="file" name="icono"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button class="boton-registrar">Actualizar</button>
                    <a href="Directorio.php">Regresar</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
