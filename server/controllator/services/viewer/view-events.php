<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$eventsDB = new PublicationDB();
$events = [];
try {
    $events = $eventsDB->getGeneralPublications(ConnectionDB::getInstance()->getConnection());
} catch (Exception $th) {
}

?>
<?php foreach ($events as $event): ?>
    <div>
        <form action="../../controllator/services/viewer/process-view-event.php" method="post">
            <input type="hidden" name="id" value="<?php echo $event->getId() ?>">
            <h3>
                <?= $event->getName() ?>
            </h3>
            <p>
                <?= $event->getDetails() ?>
            </p>
            <button type="submit" name="action" value="details">
                Ver detalles
            </button>
            <br><br>
            <button type="submit" name="action" value="publicator">
                Más sobre el publicador
            </button>
            <br><br>
            <button type="submit" name="action" value="report">
                Reportar
            </button>
        </form>

    </div>

<?php endforeach; ?>