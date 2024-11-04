<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$eventDB = new EventDB();
$users = [];
$idEvent = isset($_POST['id']) ? $_POST['id'] : -1;


$users = $eventDB->getAssistents(
    $idEvent, ConnectionDB::getInstance()->getConnection()
);

?>
<?php foreach ($users as $user): ?>
    <div class="userDisplay">
        <div action="./view-assistants.php" method="post">  
            <h3>
                Nombre: 
                <?= $user->getFirstname() ?>
                <span> </span>
                <?= $user->getLastname() ?>
            </h3>
            <p>
                Username: 
                <?= $user->getUsername() ?>
            </p>
            <p>
                Email: 
                <?= $user->getEmail() ?>
            </p>
        </div>

    </div>

<?php endforeach; ?>