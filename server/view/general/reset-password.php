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

<h1>Recuperar contraseña</h1>

<form action="registrar.php" method="post">

    <label for="email">Correo electrónico:</label>
    <input type="email" id="email" name="email" required>
    <br><br>

    <input type="submit" value="Recupear">
</form>

<?php include "./footer.php"?>
</body>
</html>