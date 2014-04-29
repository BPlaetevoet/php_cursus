<?php
class GetalArrayGenerator {
    public function getArray(){
        $tabel = array();
        for ($i=1; $i<=20; $i++){
            $randomgetal = rand(-50, 50);
            $tabel[$i]=$randomgetal;
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
