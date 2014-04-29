<?php
class GetalArrayGenerator {
    public function getArray(){
        $g1 =0;
        $tabel = array();
        for ($i=0; $i<50; $i++){
            $tabel[$i] =$g1+$i;
            $g1 = $tabel[$i];
            
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
