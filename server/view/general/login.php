<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>

<?php include "./header.php"?>

<h1>Ingresar</h1>

<form action="registrar.php" method="post">

    <label for="name">Username:</label>
    <input type="text" id="name" name="name" required>
    <br><br>

    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required>
    <br><br>
    <p><a href="./reset-password.php">¿Olvidaste tu contraseña? Clic aquí</a></p>

    <input type="submit" value="Registrarse">
</form>

<?php include "./footer.php"?>
</body>
</html>