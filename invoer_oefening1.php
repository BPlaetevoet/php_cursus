<?php 
    class Rekenen{
        public function getSom($g1, $g2 ,$b) {
            $waarde = 0;
            switch($b):
                case ($b==1):
                $waarde = $g1+$g2;
                break;
                case ($b==2):
                $waarde = $g1-$g2;
                break;
                case ($b==3):
                $waarde = $g1*$g2;
                break;
                case ($b==4):
                $waarde = $g1/$g2;
                break;
                default:
                print " onmogelijk want ".$b." is geen geldige keuze";
                    exit();
            endswitch;
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
            print ($bereken->getSom($_GET["getal1"], $_GET["getal2"], $_GET["bewerking"]));
            ?>
        </h1>
    </body>
</html>
