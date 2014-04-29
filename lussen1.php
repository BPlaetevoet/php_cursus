<?php 
 class Randomize {
     public function getRandomGetal($getal1, $getal2){
     $rand = rand($getal1, $getal2);
     return $rand;
     }
 }
?>
<DOCTYPE HTML>
    <html>
        <head>
            <meta charset="utf-8">
            <title>lusjes in php</title>
        </head>    
        <body>
        <?php 
            $randje = new Randomize();
           $getal = ($randje->getRandomGetal(1, 1000));
           while ($getal <=600) {
           print $getal."<br />";
           $getal = ($randje->getRandomGetal(1, 1000));}
           
          

            
        ?>
    
        </body>   
    </html>
