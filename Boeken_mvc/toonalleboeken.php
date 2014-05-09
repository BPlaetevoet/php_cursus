<?php
require_once 'business/boekservice.class.php';
$boekSvc = new BoekService();
$boekenlijst = $boekSvc->getBoekenOverzicht();
include 'presentation/boekenlijst.php';
