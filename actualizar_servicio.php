<?php
session_start();
include("conexion.php");


if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}


$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];


$imagen = $_FILES['imagen']['name'];
$tmp = $_FILES['imagen']['tmp_name'];

if ($imagen != "") {

    $imagen = time() . "_" . $imagen;
    $ruta = "imagenes/" . $imagen;

    move_uploaded_file($tmp, $ruta);


    $query = "UPDATE servicios 
              SET nombre='$nombre',
                  descripcion='$descripcion',
                  precio='$precio',
                  imagen='$imagen'
              WHERE id=$id";

} else {


    $query = "UPDATE servicios 
              SET nombre='$nombre',
                  descripcion='$descripcion',
                  precio='$precio'
              WHERE id=$id";
}


if (mysqli_query($conexion, $query)) {
    header("Location: servicios.php");
} else {
    echo "Error: " . mysqli_error($conexion);
}
?>
