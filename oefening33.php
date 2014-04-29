<?php

class Gokautomaat {
    public function Gokken($g1) {
        $gokgetal = rand(1, 10);
        $uitvoer = "getal :".$gokgetal."<br /> Uw gok :".$g1;
        switch ($g1) {
            case ($g1 == $gokgetal):
                $uitvoer = $uitvoer."<br />Proficiat : juist gegokt";
                break;
            case ($g1 > $gokgetal):
                $uitvoer = $uitvoer."<br />Helaas : te hoog gegokt";
                break;
            case ($g1 < $gokgetal):
                $uitvoer = $uitvoer."<br />Helaas : te laag gegokt";
                break;
        }
        return $uitvoer;
    }
}
?>
<!DOCTYPE HTML>
<html>
   <head>
      <meta charset="utf-8">
      <title>Gokautomaat</title>
   </head>
        <body>
             
            <h1>
                <?php 
                $gokje = new Gokautomaat(); 
                    print($gokje->Gokken($_GET["getal"]));
                ?>
                
            </h1>
        </body>
    </html>