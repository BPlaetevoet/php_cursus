<?php
require_once 'data/dbconfig.class.php';
require_once 'entities/genre.class.php';
require_once 'entities/boek.class.php';

class BoekDAO{
    public function getAll(){
        $lijst = array();
        $dbc = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select id as boekid, titel, a1.genre_id, omschrijving
            from mvc_boeken a1, mvc_genres a2 where a1.genre_id=a2.genre_id";
        $resultset = $dbc->query($sql);
        foreach($resultset as $rij){
            $genre = Genre::create($rij["genre_id"], $rij["omschrijving"]);
            $boek = Boek::create($rij["boekid"], $rij["titel"], $genre);
            array_push($lijst, $boek);
        }
        $dbc = null;
        return $lijst;
    }
    public function getById($id){
        $dbc = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql ="select id as boekid, titel, a1.genre_id, omschrijving from mvc_boeken a1, mvc_genres a2
            where a1.genre_id=a2.genre_id and id=".$id;
        $resultset = $dbc->query($sql);
        $rij = $resultset->fetch();
        $genre = Genre::create($rij["genre_id"], $rij["omschrijving"]);
        $boek = Boek::create($rij["boekid"], $rij["titel"], $genre);
        $dbc = null;
        return $boek;
    }
    public function create($titel, $genreId){
        $sql = "insert into mvc_boeken (titel, genre_id) values ('".$titel."', ".$genreId .")";
        $dbc = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbc->exec($sql);
        $boekId = $dbc->lastInsertId();
        $dbc = null;
        $genreDAO = new GenreDAO();
        $genre = $genreDAO->getById($genreId);
        $boek = Boek::create($boekId, $titel, $genre);
        return $boek;
        }
    public function delete($id){
        $sql = "delete from mvc_boeken where id=".$id;
        $dbc = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbc->exec($sql);
        $dbc = null;
    }
    public function update($boek){
        $sql = "update mvc_boeken set titel='" .$boek->getTitel() ."', genre_id=" .$boek->getGenre()->getId() ."
            where id=".$boek->getId();
        $dbc = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbc->exec($sql);
        $dbc = null;
    }
}
