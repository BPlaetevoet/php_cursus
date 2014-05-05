<?php

class FilmList {


    public function getFilmLijst (){
        $filmlijst =array();
        $con = new PDO("mysql:host=localhost;dbname=cursusphp", "cursusgebruiker", "cursuspwd");
        $lijst=($con->query("select titel, duurtijd from films"));
        foreach ($lijst as $rij){
            $film= $rij["titel"]." (".$rij["duurtijd"].")";
            array_push($filmlijst, $film);
        }
        $con=null;
        return $filmlijst;
        
    }
    public function controleerFilm($titel, $duur){
        if (!empty($titel) && is_numeric($duur) && $duur>0){
            $checkfilm = true;
            return $checkfilm;
        }
    }
    public function FilmToevoegen($titel, $duur){
        $con = new PDO("mysql:host=localhost;dbname=cursusphp", "cursusgebruiker", "cursuspwd");
        $sql="insert into films (titel, duurtijd) values ('".$titel."',".$duur.")";
        $con->exec($sql);
        $con = null;  
    }
}
$toevoegen = new FilmList();
if (isset($_GET["actie"])&& $_GET["actie"]=="toevoegen"){
    if ($toevoegen->controleerFilm($_POST["titel"], $_POST["duurtijd"])) {
        
        $toevoegen->FilmToevoegen($_POST["titel"], $_POST["duurtijd"]);
    }
    else {
        print 'toevoegen mislukt';
    }
    
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Oefening 9.2</title>
    </head>
    <body>
        <h1>Films</h1>
        <ul>
            <?php
            $data= new FilmList();
            $lijst = ($data->getFilmLijst());
            foreach ($lijst as $rij){
                echo '<li>'.$rij.'</li>';
            }?>
        </ul>
        <p>&nbsp;</p>
        <h1>Film toevoegen</h1>
        <form action="oefening92.php?actie=toevoegen" method="post">
            Titel: 
            <input type='text' name='titel'><br />
            Duurtijd :
            <input type="text" name="duurtijd"> minuten<br />
            <input type="submit" value="Verzenden">
        </form>
        
    </body>
</html>