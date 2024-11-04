<?php
include "../../db/ConnectionDB.php";
include "../../db/PublicationDB.php";
include "../../../model/exceptions/NoUpdateEx.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_POST['id']) ? $_POST['id'] : -1; 

    $url = '../../../view/admi_module/pendings-aproves.php';
    try {
        $publicationDB = new PublicationDB();
        $publicationDB->aprovePublication($id, ConnectionDB::getInstance()->getConnection());
        header("Location: $url?s=200");
        exit();
    } catch (Exception $e) {
        header("Location: $url?s=400");
        exit();
    }

} else {
    echo "Error";
}
?>
