<?php
session_start();
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Servicios</title>

<link rel="stylesheet" href="servicios.css">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar">
    <ul class="navbar-nav">
        <li><a href="index.php">Inicio</a></li>
        <li><a href="logout.php">Cerrar sesión</a></li>
        <?php if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin'){ ?>
            <li><a href="form_servicio.php">Registrar</a></li>
        <?php } ?>
    </ul>
</nav>

<!-- CONTENEDOR -->
<div class="container">
    <h2 class="section-title">Nuestros Servicios</h2>

    <div class="servicios-grid">

<?php
$query = "SELECT * FROM servicios";
$res = mysqli_query($conexion, $query);

while($fila = mysqli_fetch_assoc($res)){
?>

        <div class="card-servicio">
            <img src="imagenes/<?php echo $fila['imagen']; ?>" alt="">

            <h3><?php echo $fila['nombre']; ?></h3>

            <p><?php echo $fila['descripcion']; ?></p>

            <span class="precio">
                $<?php echo number_format($fila['precio'], 2); ?>
            </span>

            <?php if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin'){ ?>
                <div class="acciones">
                    <a href="editar_servicio.php?id=<?php echo $fila['id']; ?>" class="btn editar">Editar</a>

                    <a href="eliminar_servicio.php?id=<?php echo $fila['id']; ?>" 
                       class="btn eliminar"
                       onclick="return confirm('¿Eliminar este servicio?')">
                       Eliminar
                    </a>
                </div>
            <?php } ?>
        </div>

<?php } ?>

    </div>
</div>

</body>
</html>
