<?php

class Films {
    
    private $id;
    private $titel;
    private $duurtijd;
    
    public function __construct($id, $titel, $duurtijd){
        $this->id = $id;
        $this->titel = $titel;
        $this->duurtijd = $duurtijd;
    }
    public function getId(){
        return $this->id;
    }
    public function getTitel(){
        return $this->titel;
    }
    public function getDuurtijd(){
        return $this->duurtijd;
    }
}
class FilmLijst {
    public function getFilmLijst (){
        $filmlijst =array();
        $dbc = new PDO("mysql:host=localhost;dbname=cursusphp", "cursusgebruiker", "cursuspwd");
        $sql = "select id, titel, duurtijd from films";
        $lijst = $dbc->query($sql);
        foreach ($lijst as $rij){
            $film= new Films($rij["id"], $rij["titel"], $rij["duurtijd"]);
            array_push($filmlijst, $film);
        }
        $con=null;
        return $filmlijst;   
    }
    public function deleteFilm ($id){
        $dbc = new PDO("mysql:host=localhost;dbname=cursusphp","cursusgebruiker","cursuspwd");
        $sql = "delete from films where id = ".$id;
        $dbc->exec($sql);
        $dbc=null;       
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
            
            $lijst = $FilmLijst->getFilmLijst();
            foreach ($lijst as $rij){
                $filmtitel= $rij->getTitel();
                $filmid = $rij->getId();
                $filmduurtijd = $rij->getDuurtijd();
                echo '<li>'.$filmtitel.' ('.$filmduurtijd.')<a href="oefening93.php?actie=delete&id='.$filmid.'"><img src="images/delete.png"></a></li>';
            }?>
        </ul>
        <p>&nbsp;</p>
        <h1>Film toevoegen</h1>
        <form action="oefening93.php?actie=toevoegen" method="post">
            Titel: 
            <input type='text' name='titel'><br />
            Duurtijd :
            <input type="text" name="duurtijd"> minuten<br />
            <input type="submit" value="Verzenden">
        </form>
        
    </body>
</html>