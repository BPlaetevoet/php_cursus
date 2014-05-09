<?php
session_start();
require_once 'business/gebruikerservice.class.php';

if (isset($_GET["actie"]) && $_GET["actie"]=="valideer"){
    $login = GebruikerService::validateGebruiker($_POST["naam"], $_POST["paswoord"]);
    if ($login){
        $_SESSION["login"]=true;
        header("location: geheim.php");
        exit(0);
    }else{
        header("location: login.php");
        }
}else {
    include 'presentation/loginform.php';
}