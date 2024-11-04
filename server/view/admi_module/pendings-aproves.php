<?php
include "../../controllator/db/ConnectionDB.php";
include "../../controllator/db/PublicationDB.php";
include "../../model/instances/Publication.php";    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos publicados</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <?php include "./header.php"; ?>
    <h1>Publicaciones no aprobadas</h1>

    <?php 
    if(isset($_GET['s'])){
        $status = $_GET['s'];
        switch ($status) {
            case 400:
                echo '<div class="error"><p>No se pudo aprovar la publicacion</p></div>';
                break;
            default:
                echo '<div class="success"><p>Se aprobo la publicacion</p></div>';
                break;
        }
    }
    ?>

    <?php include "../../controllator/services/admin/viewPendingPublications.php" ?>
    <?php include "../general/footer.php" ?>
</body>
</html> 