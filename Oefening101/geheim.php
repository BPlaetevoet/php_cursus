<?php
session_start();
if (!isset($_SESSION["login"])|| $_SESSION["login"]!=true){
    header("location: login.php");
    exit(0);
}
include 'presentation/geheimepagina.php';

