<?php
class getallenGenerator {
    public function getGetallen(){
        $tabel =array();
        $i=0;
        do {
           $getal = rand(1, 100);
           $tabel[$i]=$getal;
           $i++ ;}
        while ($getal<80);
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
$array_maker = new getallenGenerator();
print_r($array_maker->getGetallen());
?>
        </pre>
    </body>
</html>
