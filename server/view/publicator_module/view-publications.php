<?php
include "../../controllator/db/ConnectionDB.php";
include "../../controllator/db/PublicationDB.php";
include "../../model/instances/Publication.php";  
include "../../controllator/db/PublicatorDB.php";  
include "../../controllator/util/Session.php"; 
include "../../model/instances/User.php"; 
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
    <?php include "./header.php"?>
    <h1>Publicaciones de eventos</h1>
    <?php include "../../controllator/services/publicator/viewPublications.php" ?>
    <?php include "../general/footer.php" ?>
</body>
</html>