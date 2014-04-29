<?php

class GetallenGenerator {
    public function getGetallen(){
        $getallen =array();
        for ($i=0; $i<100; $i++){
            $r = rand(1, 40);
            if (isset($getallen[$r])){
            $getallen[$r] = $getallen[$r]+1;
            } else {$getallen[$r]=1;}
        }
        return $getallen;
    }
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>een array doorlopen</title>
    </head>
    <body>
        <ul>
            <?php 
            $rand = new GetallenGenerator();
            $tabel = $rand->getGetallen();
            ksort ($tabel);
            foreach ($tabel as $nummer =>$aantal) {
                print("<li>Getal " .$nummer);
                print(" werd " .$aantal);
                print(" keer gegenereerd.");
            }
            ?>
        </ul>
    </body>
</html>
