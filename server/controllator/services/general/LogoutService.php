<?php
include "../../util/Session.php";
$sessionLO = new Session();
$sessionLO->removeSessionCookie();
header("Location: ../../../view/general/");
exit();