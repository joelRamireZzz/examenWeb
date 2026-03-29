<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "hospitalpuentecillas");

$id = $_GET['id'];
$conn->query("DELETE FROM servicios WHERE id=$id");

header("Location: servicios.php");
?>
