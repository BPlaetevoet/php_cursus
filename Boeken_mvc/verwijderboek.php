<?php
require_once 'business/boekservice.class.php';
$boekSvc = new BoekService();
$boekSvc->verwijderBoek($_GET["id"]);
header("location: toonalleboeken.php");
exit (0);
