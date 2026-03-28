<?php
include("conexion.php");

$id = $_GET['id'];

$especialidades = $conexion->query("SELECT * FROM especialidades");

$doctor = $conexion->query("SELECT * FROM doctores WHERE id_doctor = $id");
$datos = $doctor->fetch_assoc();

if($_POST){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $id_especialidad = $_POST['id_especialidad'];
        $cedula = $_POST['cedula'];
        $telefono = $_POST['telefono'];
    
        $sql = "UPDATE doctores SET nombre='$nombre', apellido='$apellido', id_especialidad='$id_especialidad', cedula='$cedula', telefono='$telefono' WHERE id_doctor=$id";
        $conexion->query($sql);
        header("Location: Directorio.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Doctor</title>
    <link rel="stylesheet" href="styleDirectorio.css">
</head>
<body>
    <h1>Editar Doctor</h1>
    <form method="POST">
        <table>
            <tr>
                <td>Nombre:</td>
                <td><input type="text" name="nombre" value="<?php echo $datos['nombre']; ?>"></td>
            </tr>
            <tr>
                <td>Apellido:</td>
                <td><input type="text" name="apellido" value="<?php echo $datos['apellido']; ?>"></td>
            </tr>
            <tr>
                <td>Especialidad:</td>
                <td>
                    <select name="id_especialidad">
                        <?php while($esp = $especialidades->fetch_assoc()){ ?>
                        <option value="<?php echo $esp['id_especialidad']; ?>"
                            <?php if($esp['id_especialidad'] == $datos['id_especialidad']) echo "selected"; ?>>
                            <?php echo $esp['nombre']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Cédula:</td>
                <td><input type="text" name="cedula" value="<?php echo $datos['cedula']; ?>"></td>
            </tr>
            <tr>
                <td>Teléfono:</td>
                <td><input type="text" name="telefono" value="<?php echo $datos['telefono']; ?>"></td>
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
