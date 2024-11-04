<?php
include "../../db/UserDB.php";
include "../../../model/exceptions/InvalidDataEx.php";
include "../../../model/exceptions/InvalidDataFormatEx.php";
include "../../../model/exceptions/InvalidCredentialsEx.php";
include "../../../model/instances/User.php";
include "../../../model/instances/Publicator.php";
include "../../../model/instances/Viewer.php";
include "../../valitators/UserValitator.php";
include "../../util/Session.php";
include "../../db/ConnectionDB.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); // Habilita errores en el arranque

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
   
    try {
        $user = new User(-1, $username, $password);
        $userDB = new UserDB();
        $userDB->recoveryCredentials(
            $user, ConnectionDB::getInstance()->getConnection()
        );
        $session = new Session();
        $session->setSessionCookie($user);
        switch ($user->getRol()) {
            case User::ADMIN_ROL:
                header("Location: ../../../view/admi_module/dashboard.php");
                exit();
            case User::PUBLICATOR_ROL:
                header("Location: ../../../view/publicator_module/dashboard.php");
                exit();
            case User::VIEWER_ROL:
                header("Location: ../../../view/user_module/dashboard.php");
                exit();
            default:
                header("Location: ../../../view/general/login.php?e=401");
                exit();
        }
    } catch (Exception | PDOException $th) {
        header("Location: ../../../view/general/login.php?e=401");
        exit();
    }
    
} else {
    /*header("Location: ../../../view/general/login.php?e=401");
    exit();*/
    echo "No se enviaron datos :c";
}
?>
