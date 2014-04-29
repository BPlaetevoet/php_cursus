<?php

class GetallenGenerator{
    public function maakGetallen(){
        $max = 50;
        $tabel =array();
        for ($i=1; $i<=$max; $i++){
           if (($i%2)!=0){
           array_push($tabel, $i);
           }
            else {};
            
        }
        for ($i=1; $i<=$max; $i++){
            if (($i%2)==0){
            array_push($tabel, $i);
           }
            else {};
            
        }
      return $tabel;
    }
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Oefening 6.4</title>
    </head>
    <body>
        <pre>
        <?php 
        $getal_array = new GetallenGenerator;
        print_r($getal_array->maakGetallen());
        ?>
        </pre>
    </body>
</html>