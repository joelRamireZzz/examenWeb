<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];


$imagen = $_FILES['imagen']['name'];
$tmp = $_FILES['imagen']['tmp_name'];


$imagen = time() . "_" . $imagen;

$ruta = "imagenes/" . $imagen;

if ($imagen != "") {
    move_uploaded_file($tmp, $ruta);

    $query = "INSERT INTO servicios (nombre, descripcion, imagen, precio)
              VALUES ('$nombre', '$descripcion', '$imagen', '$precio')";
} else {
    $query = "INSERT INTO servicios (nombre, descripcion, precio)
              VALUES ('$nombre', '$descripcion', '$precio')";
}

mysqli_query($conexion, $query);

header("Location: servicios.php");
?>
