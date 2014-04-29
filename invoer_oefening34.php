<?php 
    class Rekenen{
        public function getSom($g1, $g2) {
            $waarde = $g1 + $g2;            
            return $waarde;
        }
       
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Invoer oefening 3.2</title>
    </head>
    <body>
        <h1>
            Resultaat =
            <?php
            $bereken = new Rekenen();
            print ($bereken->getSom($_GET["getal1"], $_GET["getal2"]));
            ?>
        </h1>
    </body>
</html>
