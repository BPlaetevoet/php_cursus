<?php
class Gebruiker {
    private $naam;
    private $paswoord;
    
    public function __construct($naam, $paswoord){
        $this->naam = $naam;
        $this->paswoord = $paswoord;
    }
    public function getNaam(){
        return $this->naam;
    }
    public function getPaswoord(){
        return $this->paswoord;
    }
}
