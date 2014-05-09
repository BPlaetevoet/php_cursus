<?php
require_once 'business/gebruikerservice.class.php';

$login = new GebruikerService();
$test = $login->validateGebruiker("admin", "secret");
print '<pre>';
print_r($test);
print '</pre>';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
