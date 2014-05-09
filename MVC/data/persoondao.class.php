<?php
require_once 'entities/persoon.class.php';
require_once 'DBConfig.class.php';
class PersoonDAO {
    public function getAll(){
        $lijst = array();
        $sql = "select familienaam, voornaam from personen";
        $dbc = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultset = $dbc->query($sql);
        foreach ($resultset as $rij){
            $persoon = new Persoon($rij["familienaam"], $rij["voornaam"]);
            array_push($lijst, $persoon);
        }
        $dbc = null;
        return $lijst;
    }
}
?>
