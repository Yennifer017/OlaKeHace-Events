<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$publicatorDB = new PublicatorDB();
$events = [];
$session = new Session();
$user = $session->get_session_data();
$events = $publicatorDB->getAllPublications(
    $user->getId(), 
    ConnectionDB::getInstance()->getConnection()
);

?>
<?php foreach ($events as $event): ?>
    <div>
        <form action="./view-assistants.php" method="post">
            <input type="hidden" name="id" value="<?php echo $event->getId() ?>">
            <h3>
                Nombre: 
                <?= $event->getName() ?>
            </h3>
            <p>
                Detalles: 
                <?= $event->getDetails() ?>
            </p>
            <button type="submit" name="action" value="details">
                Ver assistentes
            </button>
        </form>

    </div>

<?php endforeach; ?>