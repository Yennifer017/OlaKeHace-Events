<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>

<body>

    <?php include "./header.php" ?>

    <h1>Ingresar</h1>

    <!-- form action="../../controllator/services/general/loginService.php" method="POST" -->
    <form action="../../controllator/services/general/loginService.php" method="POST">

        <?php
        if (isset($_GET['e'])) {
            $status = $_GET['e'];
            switch ($status) {
                case 400:
                    echo '<div class="error"><p>Request invalido, intentalo otra vez</p></div>';
                    break;
                case 401:
                    echo '<div class="error"><p>Usuario o contrasena incorrectas</p></div>';
                    break;
                case 503:
                    echo '<div class="error"><p>Conexion a la base de datos invalida :c</p></div>';
                    break;
            }
        }
        ?>
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br><br>
        <p><a href="./reset-password.php">¿Olvidaste tu contraseña? Clic aquí</a></p>

        <input type="submit" value="Registrarse">
    </form>

    <?php include "./footer.php" ?>
</body>

</html>