<?php

require_once 'films_class.php';
require_once 'filmlijst_class.php';

$FilmLijst = new FilmLijst();
if (isset($_GET["actie"]) && $_GET["actie"]=="toevoegen"){
        if ($FilmLijst->controleerFilm($_POST["titel"], $_POST["duurtijd"])) {
        $FilmLijst->FilmToevoegen($_POST["titel"], $_POST["duurtijd"]);
    } else { print 'toevoegen mislukt';
    }
}
elseif (isset($_GET["actie"]) && $_GET["actie"]=="delete"){
        $FilmLijst->deleteFilm($_GET["id"]);
    }  
    elseif (isset($_GET["actie"]) && $_GET["actie"] == "update"){
        $FilmLijst->bewerkFilm($_GET["id"], $_GET["titel"], $_GET["duurtijd"]);
    }

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Oefening 9.4 gegevens bewerken</title>
    </head>
    <body>
        <h1>Films</h1>
        <ul>
            <?php
            
            $lijst = $FilmLijst->getFilmLijst();
            foreach ($lijst as $rij){
                $filmtitel= $rij->getTitel();
                $filmid = $rij->getId();
                $filmduurtijd = $rij->getDuurtijd();
                echo '<li>'.$filmtitel.' ('.$filmduurtijd.')<a href="oefening94.php?actie=delete&id='.$filmid.'"><img src="images/delete.png"></a> 
                    <a href="oef94bewerken.php?id='.$filmid.'"> (bewerken) </a></li>';
            }?>
        </ul>
        <p>&nbsp;</p>
        <h1>Film toevoegen</h1>
        <form action="oefening94.php?actie=toevoegen" method="post">
            Titel: 
            <input type='text' name='titel'><br />
            Duurtijd :
            <input type="text" name="duurtijd"> minuten<br />
            <input type="submit" value="Verzenden">
        </form>
        
    </body>
</html>