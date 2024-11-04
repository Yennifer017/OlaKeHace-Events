<?php
include "../../controllator/db/ConnectionDB.php";
include "../../controllator/db/PublicationDB.php";
include "../../model/instances/Publication.php";  
include "../../controllator/db/PublicatorDB.php";  
include "../../controllator/util/Session.php"; 
include "../../model/instances/User.php"; 
include "../../controllator/db/EventDB.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistentes del evento</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="stylesheet" href="../../assets/css/userStyles.css">
</head>
<body>
    <?php include "./header.php"?>
    <h1>Asistentes al evento</h1>
    <?php include "../../controllator/services/publicator/viewAssistants.php" ?>
    <?php include "../general/footer.php" ?>
</body>
</html>