<?php
session_start();

$conn = new mysqli("localhost", "root", "", "hospitalpuentecillas");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if (isset($_SESSION['usuario'])) {
    header("Location: inicio.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios 
            WHERE correo='$correo' AND estatus='activo'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if ($password == $user['password']) {

            $_SESSION['usuario'] = $user['nombre'];
            $_SESSION['rol'] = $user['rol'];

            if ($user['rol'] == 'admin') {
                header("Location: inicio.php");
            } else {
                header("Location: inicio.php");
            }
            exit();

        } else {
            $error = "Contraseña incorrecta";
        }

    } else {
        $error = "Usuario no encontrado o inactivo";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Hospital puentecillas</title>
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Hospital Puentecillas</h2>
            <p class="sub">Iniciar sesión</p>
            <?php if (isset($error)) { ?>
                <div class="error-box"><?php echo $error; ?></div>
            <?php } ?>

            <form method="POST">
                <div class="input-group">
                    <input type="email" name="correo" required>
                    <label>Correo</label>
                </div>

                <div class="input-group">
                    <input type="password" name="password" required>
                    <label>Contraseña</label>
                </div>
                
                <button type="submit">Entrar</button>
            </form>
        </div>
    </div>

</body>
</html>
