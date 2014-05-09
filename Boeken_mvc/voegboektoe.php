<?php
require_once 'business/genreservice.class.php';
require_once 'business/boekservice.class.php';

if (isset($_GET["action"]) && $_GET["action"]== "process"){
    $boekSvc = new BoekService();
    $boekSvc->voegNieuwBoekToe($_POST["txtTitel"], $_POST["selGenre"]);
    header("location: toonalleboeken.php");
    exit(0);
}else{
    $genreSvc = new GenreService();
    $genreLijst = $genreSvc->getGenresOverzicht();
    include 'presentation/nieuwboekform.php';
}