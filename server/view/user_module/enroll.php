<?php
include "../../controllator/db/ConnectionDB.php";
include "../../controllator/db/PublicationDB.php";
include "../../model/instances/Publication.php";  
include "../../controllator/db/PublicatorDB.php";  
include "../../controllator/util/Session.php"; 
include "../../model/instances/User.php"; 
include "../../controllator/db/ViewerDB.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <?php include "./header.php"?>
    <h1>Eventos</h1>
    <h2>Donde se confirmo la participacion</h2>
    <?php include "../../controllator/services/viewer/viewEnrolledEvents.php" ?>
    <?php include "../general/footer.php" ?>
</body>
</html>