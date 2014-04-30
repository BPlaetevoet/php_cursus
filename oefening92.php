<?php
class FilmList {
    private $titel;
    private $duurtijd;
    static function connectDB(){
        $con=new PDO("mysql:host=localhost;dbname=cursusphp", "cursusgebruiker", "cursuspwd");
    }

    public function getFilmLijst(){
        $filmlijst =array();
        $con =self::connectDB();
        $lijst=($con->query("select titel, duurtijd from films"));
        return $lijst;        
    }
    public function FilmToevoegen($t, $d){
        $con=self::connectDB();
        $sql="insert into films titel, duurtijd";
        $con->exec($sql);
        $con = null;  
    }
}
?>
<!DOCTYPE HTML>