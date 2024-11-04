<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$eventsDB = new PublicationDB();
$events = [];
$events = $eventsDB->getPendingAprovedPublicactions(ConnectionDB::getInstance()->getConnection())


?>
<?php foreach ($events as $event): ?>
    <div>
        <form action="../../controllator/services/admin/aprovePublication.php" method="post">
            <input type="hidden" name="id" value="<?php echo $event->getId() ?>">
            <h3>
                Nombre: 
                <?= $event->getName() ?>
            </h3>
            <p>
                Detalles:
                <?= $event->getDetails() ?>
            </p>
            <button type="submit" name="action" value="Aprovar">
                Aprobar
            </button>
        </form>

    </div>

<?php endforeach; ?>