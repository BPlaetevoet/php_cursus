<?php
require_once 'data/dbconfig.class.php';
require_once 'entities/genre.class.php';

class GenreDAO {
    public function getAll(){
        $lijst = array();
        $dbc = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select genre_id, omschrijving from mvc_genres";
        $resultset = $dbc->query($sql);
        foreach($resultset as $rij){
            $genre = Genre::create($rij["genre_id"], $rij["omschrijving"]);
            array_push($lijst, $genre);
        }
        $dbc = null;
        return $lijst;
    }
    public function getById($id){
        $dbc = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select genre_id, omschrijving from mvc_genres where genre_id=".$id;
        $resultset = $dbc->query($sql);
        $rij = $resultset->fetch();
        $genre = Genre::create($id, $rij["omschrijving"]);
        $dbc = null;
        return $genre;
    }
}
