<?php
include("conexion.php");

$especialidades = $conexion->query("SELECT * FROM especialidades");

if($_POST){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $id_especialidad = $_POST['id_especialidad'];
    $cedula = $_POST['cedula'];
    $telefono = $_POST['telefono'];

    $sql = "INSERT INTO doctores (nombre, apellido, id_especialidad, cedula, telefono)
            VALUES ('$nombre', '$apellido', '$id_especialidad', '$cedula', '$telefono')";

    $conexion->query($sql);

    header("Location: Directorio.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Doctor</title>
    <link rel="stylesheet" href="styleDirectorio.css">
</head>
<body>
    <h1>Registrar Doctor</h1>
    <form method="POST">
        <table>
            <tr>
                <td>Nombre:</td>
                <td><input type="text" name="nombre" required></td>
            </tr>
            <tr>
                <td>Apellido:</td>
                <td><input type="text" name="apellido" required></td>
            </tr>
            <tr>
                <td>Especialidad:</td>
                <td>
                    <select name="id_especialidad">
                        <?php while($esp = $especialidades->fetch_assoc()){ ?>
                        <option value="<?php echo $esp['id_especialidad']; ?>">
                            <?php echo $esp['nombre']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
        <tr>
            <td>Cédula:</td>
            <td><input type="text" name="cedula"></td>
        </tr>
        <tr>
            <td>Teléfono:</td>
            <td><input type="text" name="telefono"></td>
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
