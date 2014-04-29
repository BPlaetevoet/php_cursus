<?php
class GetalArrayGenerator {
    public function getArray(){
        $g1 =0;
        $g2 =1;
        $tabel = array();
        for ($i=0; $i<30; $i++){
            $tabel[$i] =$g1;
            $g1 = $tabel[$i];
            $g3 = $g1 +$g2;
            $g1 = $g2;
            $g2 = $g3;
        }
        return $tabel;
    }
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Array voorbeeld</title>
    </head>
    <body>
        <pre>
<?php 
$arrGen = new GetalArrayGenerator();
print_r($arrGen->getArray());
?>
        </pre>
    </body>
</html>
