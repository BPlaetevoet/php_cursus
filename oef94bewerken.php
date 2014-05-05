<?php
require_once 'films_class.php';
require_once 'filmlijst_class.php';

if (isset($_GET["actie"]) && $_GET["actie"] == "verwerk"){
    $film = new Films($_GET["id"], $_POST["titel"],$_POST["duurtijd"]);
    $filmlijst = new FilmLijst();
    $filmlijst->updateFilm($film);
    $updated = true;
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Oefening 9.4 Update</title>
    </head>
    <body>
        <h1>Film bewerken</h1>
        <?php
        if (isset ($updated)&& $updated == true){ print ("record bijgewerkt !");}
        $filmlijst = new FilmLijst();
        $film = $filmlijst->getFilmById($_GET["id"]);
        ?>
        <form action="oef94bewerken.php?actie=verwerk&id=<?php print ($_GET["id"]); ?>" method="post">
        Naam :
        <input type="text" name="titel" value="<?php print ($film->getTitel());?>"><br><br>
        Duurtijd :
        <input type="number" name="duurtijd" value="<?php print ($film->getDuurtijd());?>"> minuten<br><br>
        <input type="submit" value="opslaan">
        </form> 
        <br>
        <a href="oefening94.php">Terug naar overzicht</a>
    </body>
</html>
