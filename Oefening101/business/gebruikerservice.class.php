<?php
require_once 'data/gebruikerdao.class.php';

class GebruikerService{
    
   
    public static function validateGebruiker($naam, $paswoord){
        if ($naam == "admin" && $paswoord == "secret")
            return true;
        else 
            return false;
    }
}