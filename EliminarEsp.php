<?php
include("conexion.php");

$id = $_GET['id'];

$sql = "DELETE FROM especialidades WHERE id_especialidad = $id";
$conexion->query($sql);

header("Location: Directorio.php");
?>
