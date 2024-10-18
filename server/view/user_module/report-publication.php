<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>

<body>
    <?php 
    include "./header.php"; 
    if(isset($_GET['s'])){
        $status = $_GET['s'];
        switch ($status) {
            case 400:
                echo "<p>No se creo correctamente el registro de reporte</p>";
                break;
            default:
                echo "<p>Se reporto correctamente.</p>";
                break;
        }
    }
    ?>

    <h1>Reportar publicacion</h1>
    <form action="../../controllator/services/viewer/reportService.php" method="post">
        <?php $id = isset($_GET['id']) ? $_GET['id'] : -1;?>
        <input type="hidden" name="id" value="<?php echo $id; ?>" id="id">

        <label for="reason">Razon del reporte: </label>
        <select id="reason" name="reason">
            <option value="INAPPROPRIATE">Inapropiado</option>
            <option value="FAKE">Falso</option>
            <option value="SPAM">Spam</option>
            <option value="FRAUD">Fraude</option>
            <option value="HATE">Odio</option>
            <option value="ILLEGAL">Ilegal</option>
        </select>
        <br><br>

        <label for="details">Detalles adicionales (no obligatorio): </label>
        <textarea id="details" name="details" rows="4" cols="50" placeholder="Escribe aquí los detalles...">
        </textarea>

        <button type="submit">Enviar</button>
    </form>
    <?php include "../general/footer.php"; ?>
</body>

</html>