<?php
require_once ("business/persoonservice.class.php");
$pService = new PersoonService();
$personen = $pService->getPersonenOverzicht();
include ("presentation/personenlijst.php");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
