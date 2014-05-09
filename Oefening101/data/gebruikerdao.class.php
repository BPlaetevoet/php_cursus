<?php
require_once 'data/DBConfig.class.php';
require_once 'entities/gebruiker.class.php';
class GebruikerDAO{
    public function getAll(){
        $lijst=array();
        $sql = "select id, gebruikersnaam, wachtwoord from gebruikers";
        $dbc = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultset = $dbc->query($sql);
        foreach ($resultset as $rij){
            array_push($lijst, $rij);
        }
        $dbc = null;
        return $lijst;
    }
    
}