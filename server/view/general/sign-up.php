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

<?php
if (isset($_GET['e'])) {
    $error = $_GET['e'];
    switch ($error) {
        case 'p':
            echo '<p class="error">Las contrasenas no son iguales<p>';
            break;
        case 'd':
            echo '<p class="error">El formato de datos ingresado es invalido<p>';
            break;
        case 'db':
            echo '<p class="error">El username o el correo electronico ya estan en uso<p>';
            break;
        case 'e':
            echo '<p class="error">Ocurrio un error inesperado, intentalo de nuevo mas tarde<p>';
            break;
    }
}
?>

<form action="../../controllator/services/viewer/createAccount.php" method="post">

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

    <label for="dob">Fecha de nacimiento:</label>
    <input type="date" id="dob" name="dob" required>
    <br><br>

    <input type="submit" value="Registrarse">
</form>

<?php include "./footer.php"?>
</body>
</html>