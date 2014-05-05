<?php
require_once 'films_class.php';
class FilmLijst {
    
    private $dbConn;
    private $dbUsername;
    private $dbPassword;
    
    public function __construct(){
        $this->dbConn ="mysql:host=localhost; dbname=cursusphp";
        $this->dbUsername = "cursusgebruiker";
        $this->dbPassword = "cursuspwd";
    }
    
    public function getFilmLijst (){
        $filmlijst =array();
        $sql = "select id, titel, duurtijd from films";
        $dbc = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
        $lijst = $dbc->query($sql);
        foreach ($lijst as $rij){
            $film= new Films($rij["id"], $rij["titel"], $rij["duurtijd"]);
            array_push($filmlijst, $film);
        }
        $dbc=null;
        return $filmlijst;   
    }
    public function getFilmById($id){
        $sql="select titel, duurtijd from films where id=" .$id;
        $dbc = new PDO($this->dbConn, $this->dbUsername,$this->dbPassword);
        $result = $dbc->query($sql);
        if ($result){
            $rij = $result->fetch();
            if ($rij) {
                $film = new Films($id, $rij["titel"], $rij["duurtijd"]);
                $dbc = null;
                return $film;
            }else return false;
        }else return false;
    }
    public function updateFilm ($film){
        $sql = "update films set titel = '" .$film->getTitel()."', 
            duurtijd =" .$film->getDuurtijd() ." where id = " .$film->getId();
        $dbc = new PDO($this->dbConn, $this->dbUsername,$this->dbPassword);
        $dbc->exec($sql);
        $dbc = null;
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
?>
