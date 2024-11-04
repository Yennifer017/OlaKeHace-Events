<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$viewerDB = new ViewerDB;
$events = [];
$session = new Session();
$user = $session->get_session_data();
$events = $viewerDB->getEnrollEvents(
    $user->getId(), 
    ConnectionDB::getInstance()->getConnection()
);

?>
<?php foreach ($events as $event): ?>
    <div>
        <form action="./view-assistants.php" method="post">
            <!-- input type="hidden" name="id" value="<php echo $event->getId() ?>" -->
            <h3>
                Nombre: 
                <?= $event->getName() ?>
            </h3>
            <p>
                Detalles: 
                <?= $event->getDetails() ?>
            </p>
        </form>

    </div>

<?php endforeach; ?>