<?php

class Oefening {
   public function getDefine ($getal){

      switch ($getal){
          case "1":
              print("één");
              break;
          case "2":
              print("twee");
              break;
          case "3":
              print("drie");
              break;
          case "4":
              print("vier");
              break;
          case "5":
              print("vijf");
              break;
          default:
              print $getal;
              break;
      }
   }
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Analyse van getallen</title>
    </head>
    <body>
        <h1>
            <?php 
            $oef = new Oefening();
              print($oef->getDefine(-1));  
            ?>
        </h1>
    </body>
</html>