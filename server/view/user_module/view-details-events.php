<?php
include "../../model/instances/Publication.php";
include "../../controllator/db/PublicationDB.php";
include "../../controllator/db/ConnectionDB.php";
include "../../controllator/util/Session.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="stylesheet" href="../../assets/css/publicationStyles.css">
</head>

<body>
    <?php
    if (isset($_COOKIE[Session::SESSION_COOKIE_NAME])){
        include "./header.php";
    }
    $id = isset($_GET['id']) ? $_GET['id'] : -1;
    $publicationDB = new PublicationDB();
    $publication = $publicationDB->getOnePublication(
        $id, 
        ConnectionDB::getInstance()->getConnection()
    );
    ?>

    <h1>Detalles de publicacion</h1>

    <?php
        if (isset($_GET['s'])) {
            $status = $_GET['s'];
            switch ($status) {
                case 400:
                    echo '<div class="error"><p>No se pudo registrar la confirmacion de asistencia</p></div>';
                    break;
                default:
                    echo '<div class="success"><p>Confirmacion de asistencia exitosa</p></div>';
                    break;
            }
        }
    ?>

    <div class="publication-details">

        <h2>Información del evento</h2>
        <p>
            <strong>Nombre del evento:</strong>
            <span id="name"><?php echo $publication->getName(); ?></span>
        </p>

        <hr>

        <h2>Ubicación del evento</h2>
        <p>
            <strong>Región:</strong>
            <span id="region"><?php echo $publication->getRegion(); ?></span>
        </p>
        <p>
            <strong>Lugar:</strong>
            <span id="place"><?php echo $publication->getPlace(); ?></span>
        </p>
        <p>
            <strong>Fecha de inicio:</strong>
            <span id="dateInit"><?php echo $publication->getDate(); ?></span>
        </p>
        <p>
            <strong>Hora de inicio:</strong>
            <span id="hourInit"><?php echo $publication->getHour(); ?></span>
        </p>

        <hr>

        <h2>Sobre el público objetivo</h2>
        <p>
            <strong>Tipo de público:</strong>
            <span id="typePublic"><?php echo $publication->getTypePublic(); ?></span>
        </p>
        <p>
            <strong>Cupo máximo:</strong>
            <span id="cupo"><?php echo $publication->getCupo(); ?></span>
        </p>

        <hr>

        <h2>Información Adicional</h2>
        <p>
            <strong>Detalles:</strong>
        </p>
        <p id="details"><?php echo $publication->getDetails(); ?></p>
        <p>
            <strong>Link de referencia:</strong>
            <a href="<?php echo $publication->getUrl(); ?>" 
                id="urlRef"><?php echo $publication->getUrl(); ?>
            </a>
        </p>

    </div>

    <?php if (isset($_COOKIE[Session::SESSION_COOKIE_NAME])): ?>
        <form action="../../controllator/services/viewer/enrollEvent.php" method="post">
            <?php $id = isset($_GET['id']) ? $_GET['id'] : -1; ?>
            <input type="hidden" name="id" value="<?php echo $id; ?>" id="id">
            <button type="submit">Confirmar Asistencia</button>
        </form>
    <?php endif; ?>

    <?php include "../general/footer.php"; ?>
</body>

</html>