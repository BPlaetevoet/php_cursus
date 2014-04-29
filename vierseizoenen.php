<?php
class seizoenGenerator {
    public function getSeizoenen(){
        $seizoen =array();
        array_push($seizoen, "lente");
        array_push($seizoen, "zomer");
        array_push($seizoen, "herfst");
        array_push($seizoen, "winter");
        return $seizoen;
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
$arr_seizoenen = new seizoenGenerator();
print_r($arr_seizoenen->getSeizoenen());
?>
        </pre>
    </body>
</html>
