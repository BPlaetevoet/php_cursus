<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GetallenReeksMaker
 *
 * @author User_2
 */
class GetallenReeksMaker {
    //put your code here
    public function getReeks(){
        $reeks = array();
       for ($i=0; $i < 10; $i++){
           $reeks[$i]= rand(1, 100);
       }
       rsort ($reeks);
       return $reeks;
       
       }
    
}

?>
