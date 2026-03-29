<?php
session_start();

// PROTEGER SOLO ADMIN
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Registrar Servicio</title>

<link href="https://fonts.googleapis.com/css2?family=Google+Sans&display=swap" rel="stylesheet">
<link rel="stylesheet" href="estilo.css">

</head>

<body>

<div class="form-container">
    <h2>Registrar Servicio</h2>

    <form action="guardar_servicio.php" method="POST" enctype="multipart/form-data">
        
        <input type="text" name="nombre" placeholder="Nombre del servicio" required>

        <textarea name="descripcion" placeholder="Descripción" required></textarea>

        <input type="number" name="precio" placeholder="Precio ($)" step="0.01" required>

        <input type="file" name="imagen" accept="image/*" required>

        <button type="submit">Guardar Servicio</button>
    </form>

    <br>
    <a href="servicios.php">⬅ Regresar</a>
</div>

</body>
</html>
