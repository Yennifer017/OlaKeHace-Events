<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $lastname = isset($_POST['lastname']) ? trim($_POST['lastname']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $confirm_password = isset($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';

    if($password != $confirm_password){
        header("Location: ../../../view./general/publicator-signup.php?e=p");
        exit();
    }

    try {
        $publicator = new Publicator(-1, $username, $password, $firstname, $lastname);
        $userDB = new UserDB();
        $publicator = $userDB->createPublicator($publicator, ConnectionDB::getInstance()->getConnection());
        
    } catch (InvalidDataFormatEx | InvalidDataEx $e) {
        header("Location: ../../../view./general/publicator-signup.php?e=d");
        exit();
    } catch (PDOException $e){
        header("Location: ../../../view./general/publicator-signup.php?e=db");
        exit();
    }catch (Exception $e){
        header("Location: ../../../view./general/publicator-signup.php?e=e");
        exit();
    }

}
?>
