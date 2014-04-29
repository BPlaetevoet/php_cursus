<?php
class LottoNummers{
    public function GetLottoGetallen(){
        $lottocijfers=  array();
        while (count($lottocijfers) < 6){
            do {
                $cijfer =  rand(1, 42);
            } 
            while(in_array($cijfer, $lottocijfers));
                        $lottocijfers[] = $cijfer;
        }
        return $lottocijfers;
    }
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Loterijgetallen</title>
    </head>
    <body>
        <table border="1">
            <?php 
            $trekking = new LottoNummers;
            $winnendecijfers=($trekking->GetLottoGetallen());
            $nummer=1;
            for ($nummer=1; $nummer <=42; $nummer++){
                if (in_array($nummer, $winnendecijfers)){
                    $bgcolor='#c0c0c0';
                } else {
                    $bgcolor='#fff';
                }
                if ($nummer %7 == 1)print ('<tr>');
                print ('<td style="background-color:'.$bgcolor.'">'.$nummer.'</td>');
                if ($nummer %7 ==0) print ('</tr>');
                }
                
         
                    
            ?>
            
        </table>
    </body>
</html>