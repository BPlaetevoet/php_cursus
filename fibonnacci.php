<?php 
 class Fibonnacci {
     public function getFibo($max){
         $getal1 = 0;
         $getal2 = 1;
         print $getal1 ." , ".$getal2 ." , ";
         $getal3 = $getal1 + $getal2;
         while ($getal3 < $max){
         print $getal3 ." , ";
         $getal1 = $getal2;
         $getal2 = $getal3;
         $getal3 = $getal1 + $getal2;
         }
         }
 }
?>

<!DOCTYPE HTML>
    <html>
        <head>
            <meta charset="utf-8">
            <title>lusjes in php</title>
        </head>    
        <body>
        <?php 
            $Fibon = new Fibonnacci();
            print ($Fibon->getFibo(50000));
            
        ?>
    
        </body>   
    </html>
