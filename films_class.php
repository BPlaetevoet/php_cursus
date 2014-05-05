<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of films_class
 *
 * @author User_2
 */
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
    public function setTitel ($titel){
        $this->titel=$titel;
    }
    public function setDuurtijd ($duurtijd){
        $this->duurtijd=$duurtijd;
    }
}

?>
