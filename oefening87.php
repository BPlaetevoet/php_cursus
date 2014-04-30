<?php
abstract class Rekening {
    private $rekeningnr;
    private $saldo;
    function __construct($nr){
        $this->rekeningnr = $nr;
        $this->saldo = 0;
        }
    public function stort($bedrag){
        $this->saldo +=$bedrag;
    }
    public function getSaldo(){
        return $this->saldo;
    }
    public function voerInterestDoor(){
        $this->saldo = $this->saldo +($this->saldo*static::$interest);
    }
}
class SpaarRekening extends Rekening{
    static protected $interest =0.03;
}
class ZichtRekening extends Rekening{
    static protected $interest =0.025;
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Oefening 8.7 Rekening</title>
    </head>
    <body>
        <h1>
            <?php
            $rek= new SpaarRekening("091-0122401-16");
            print ("Het saldo is: ".$rek->getSaldo() ."<br>");
            $rek->stort(200);
            print ("Het saldo is: ".$rek->getSaldo() ."<br>");
            $rek->voerInterestDoor();
            print ("Het saldo is: ".$rek->getSaldo() ."<br>");
            print '<p>&nbsp</p>';
            $zichtrek= new ZichtRekening("953-0395750-56");
            print ("Het saldo van uw zichtrekening is: ".$zichtrek->getSaldo() ."<br>");
            $zichtrek->stort(200);
            print ("Het saldo van uw zichtrekening is: ".$zichtrek->getSaldo() ."<br>");
            $zichtrek->voerInterestDoor();
            print ("Het saldo van uw zichtrekening is: ".$zichtrek->getSaldo() ."<br>");
            ?>
        </h1>
    </body>
</html>
