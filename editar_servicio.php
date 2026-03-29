<?php
session_start();


if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}


$conn = new mysqli("localhost", "root", "", "hospitalpuentecillas");

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM servicios WHERE id=$id");
$servicio = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Editar Servicio</title>

<link href="https://fonts.googleapis.com/css2?family=Google+Sans&display=swap" rel="stylesheet">
<link rel="stylesheet" href="estilo.css">
</head>

<body>

<div class="form-container">
    <h2>Editar Servicio</h2>

    <form action="actualizar_servicio.php" method="POST" enctype="multipart/form-data">
        
        <input type="hidden" name="id" value="<?php echo $servicio['id']; ?>">

        <input type="text" name="nombre" value="<?php echo $servicio['nombre']; ?>" required>

        <textarea name="descripcion" required><?php echo $servicio['descripcion']; ?></textarea>

        <input type="number" name="precio" value="<?php echo $servicio['precio']; ?>" step="0.01" required>

        <p>Imagen actual:</p>
        <img src="imagenes/<?php echo $servicio['imagen']; ?>"><br><br>

        <input type="file" name="imagen" accept="image/*">

        <button type="submit">Actualizar</button>
    </form>

    <br>
    <a href="servicios.php">⬅ Regresar</a>
</div>

</body>
</html>
