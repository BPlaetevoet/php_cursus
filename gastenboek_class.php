<?php
class GastenBoek {
    private $id;
    private $auteur;
    private $boodschap;
    private $datum;
    
    public function __construct($id, $auteur, $boodschap, $datum){
        $this->id = $id;
        $this->auteur = $auteur;
        $this->boodschap = $boodschap;
        $this->datum = $datum;
    }
    
    public function getId (){
        return $this->id;
    }
    public function getAuteur (){
        return $this->auteur;
    }
    public function getBoodschap(){
        return $this->boodschap;
    }
    public function getDatum(){
        return $this->datum;
    }
    public function setAuteur($auteur){
        $this->auteur = $auteur;
    }
    public function setBoodschap(){
        $this->boodschap = $boodschap;
    }
    public function setDatum(){
        $this->datum = $datum;
    }
}

?>
