<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publications</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>

<body>
    <h1>Agregar publicación</h1>

    <form action="registrar.php" method="post">

        <label for="name">Nombre del evento:</label>
        <input type="text" name="name" id="name" required>

        <hr>

        <h2>Ubicación del evento</h2>
        <label for="region">Region:</label>
        <input type="region" id="region" name="region" required>
        <br><br>

        <label for="place">Lugar:</label>
        <input type="place" id="place" name="place" required>
        <br><br>

        <label for="dateInit">Fecha de inicio:</label>
        <input type="date" id="dateInit" name="dateInit" required>
        <br><br>

        <label for="hourInit">Hora de inicio:</label>
        <input type="hour" id="hourInit" name="hourInit" required>

        <hr>
        
        <h2>Sobre el público objetivo</h2>
        <label for="typePublic">Tipo de publico:</label>
        <select name="typePublic" id="typePublic">
            <option value="<?php echo PublicationConst::PUBLIC_CHILDREN?>">Niños</option>
            <option value="<?php echo PublicationConst::PUBLIC_TEEN?>">Adolescentes</option>
            <option value="<?php echo PublicationConst::PUBLIC_YOUNG_ADULT?>">Adultos jóvenes</option>
            <option value="<?php echo PublicationConst::PUBLIC_ADULT?>">Adultos</option>
            <option value="<?php echo PublicationConst::PUBLIC_OLDS?>">Adultos mayores</option>
        </select>

        <label for="cupo">Cupo máximo:</label>
        <input type="number" id="cupo" name="cupo" step="1" required>

        <hr>

        <h2>Información Adicional</h2>
        <label for="details">Detalles</label>
        <textarea name="details" id="details" placeholder="Especifica los detalles del evento aqui...">
        </textarea>

        <label for="urlRef">Link de referencia: </label>
        <input type="url" name="urlRef" id="urlRef">

        <input type="submit" value="Registrar evento">

    </form>
</body>

</html>