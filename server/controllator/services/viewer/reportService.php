<?php
include "../../db/ConnectionDB.php";
include "../../db/ReportDB.php";
include "../../../model/instances/Report.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_POST['id']) ? $_POST['id'] : -1; 
    $reason = isset($_POST['reason']) ? $_POST['reason'] : ''; 
    $details = isset($_POST['details']) ? $_POST['details'] : ''; 

    $url = '../../../view/user_module/report-publication.php';
    try {
        $reportDB = new ReportDB();
        $report = new Report($id, '', $reason, $details);
        $reportDB->addReport($report, ConnectionDB::getInstance()->getConnection());
        header("Location: $url?id=$id&s=200");
        exit();
    } catch (Exception $e) {
        /*echo $id;
        echo $e;*/
        header("Location: $url?id=$id&s=400");
        exit();
    }

} else {
    echo "Error";
}
?>
