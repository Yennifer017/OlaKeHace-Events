<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $accion = $_POST['action']; 
    $id = isset($_POST['id']) ? $_POST['id'] : -1;

    if ($accion == 'details') {

        //ir a otra pestana
    } elseif ($accion == 'publicator') {

        //ir a otra pestana
    } elseif ($accion == 'report'){
        header
        ("Location: ../../../view/user_module/report-publication.php?id=" . $id);
        exit();
    } else {

        echo $accion;
        echo "Acción no válida.";
    }
}