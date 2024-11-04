<?php
include "../../db/ConnectionDB.php";
include "../../../model/instances/User.php";
include "../../db/ViewerDB.php";
include "../../util/Session.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = (int) $_POST['id']; 

    $url = '../../../view/user_module/view-details-events.php';
    try {
        $session = new Session();
        $user = $session->get_session_data();
        $viewerDB = new ViewerDB();
        $viewerDB->enrroll(
            $user->getId(), 
            $id, 
            ConnectionDB::getInstance()->getConnection()
        );
        header("Location: $url?s=200");
        exit();
    } catch (Exception $th) {
        header("Location: $url?s=200");
        exit();
    }
} else {
    echo "No se recibió la solicitud de inscripción correctamente.";
}
?>
