<?php
include "../../db/UserDB.php";
include "../../../model/exceptions/InvalidDataEx.php";
include "../../../model/exceptions/InvalidDataFormatEx.php";
include "../../../model/instances/User.php";
include "../../../model/instances/Publicator.php";
include "../../../model/instances/Viewer.php";
include "../../valitators/UserValitator.php";
include "../../util/Session.php";
include "../../db/ConnectionDB.php";
include "../../../model/instances/Publication.php";
include "../../../controllator/db/PublicationDB.php";

error_reporting(E_ALL); // Reporta todos los errores
ini_set('display_errors', 1); // Muestra los errores en la salida
ini_set('display_startup_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $region = isset($_POST['region']) ? trim($_POST['region']) : '';
    $place = isset($_POST['place']) ? trim($_POST['place']) : '';
    $dateInit = isset($_POST['dateInit']) ? trim($_POST['dateInit']) : '';
    $hourInit = isset($_POST['hourInit']) ? trim($_POST['hourInit']) : '';
    $typePublic = isset($_POST['typePublic']) ? trim($_POST['typePublic']) : '';
    $cupo = isset($_POST['cupo']) ? (int)$_POST['cupo'] : 0;
    $details = isset($_POST['details']) ? trim($_POST['details']) : '';
    $urlRef = isset($_POST['urlRef']) ? trim($_POST['urlRef']) : '';

    try {
        $event = new Publication(
            -1, $region, $place, 
            $dateInit, $hourInit, $cupo, 
            $typePublic, $details, $urlRef, $name
        );
        $eventsDB = new PublicationDB();
        $session = new Session();
        $user = $session->get_session_data();
        $eventsDB->addPublication(
            $event, 
            ConnectionDB::getInstance()->getConnection(), 
            $user->getId()
        );
        header("Location: ../../../view/publicator_module/add-publications.php?e=200");
        exit();
    } catch (Exception $th) {
        header("Location: ../../../view/publicator_module/add-publications.php?e=400");
        exit();
        //echo $th->getMessage();
    }

} else {
    echo "Acceso no autorizado.";
}
?>
