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

<h1>Registro</h1>

<form action="registrar.php" method="post">

    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name" required>
    <br><br>

    <label for="lastname">Apellido:</label>
    <input type="text" id="lastname" name="lastname" required>
    <br><br>

    <label for="email">Correo electrónico:</label>
    <input type="email" id="email" name="email" required>
    <br><br>

    <label for="username">Nombre de usuario:</label>
    <input type="text" id="username" name="username" required>
    <br><br>

    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required>
    <br><br>

    <label for="confirm_password">Confirmar contraseña:</label>
    <input type="password" id="confirm_password" name="confirm_password" required>
    <br><br>

    <!-- Fecha de nacimiento -->
    <label for="dob">Fecha de nacimiento:</label>
    <input type="date" id="dob" name="dob" required>
    <br><br>

    <!-- Botón de envío -->
    <input type="submit" value="Registrarse">
</form>

<?php include "./footer.php"?>
</body>
</html>