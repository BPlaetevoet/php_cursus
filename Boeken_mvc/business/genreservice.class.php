<?php
require_once 'data/genredao.class.php';
class GenreService{
    
    public function getGenresOverzicht(){
        $genreDAO = new GenreDAO();
        $lijst = $genreDAO->getAll();
        return $lijst;
    }
}