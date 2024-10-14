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

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = isset($_POST['name']) ? trim($_POST['name']) : '';
    $lastname = isset($_POST['lastname']) ? trim($_POST['lastname']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $confirm_password = isset($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';

    $url = '../../../view/general/publicator-signup.php';
    if($password != $confirm_password){
        header("Location: $url?e=p");
        exit();
    }
    try {
        $publicator = new Publicator(
            -1, $username, $password, $firstname, $lastname, $email
        );
        $userDB = new UserDB();
        $publicator = $userDB->createPublicator(
            $publicator, ConnectionDB::getInstance()->getConnection()
        );
        $session = new Session();
        $session->setSessionCookie($publicator);
        header("Location: ../../../view/publicator_module/dashboard.php");
        exit();
    } catch (InvalidDataFormatEx | InvalidDataEx $e) {
        header("Location: $url?e=d");
        exit();
    } catch (PDOException $e){
        header("Location: $url?e=db");
        exit();
    }catch (Exception $e){
        header("Location: $url?e=e");
        exit();
    }

}
?>
