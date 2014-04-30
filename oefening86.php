<?php
class Rekening {
    private $rekeningnr;
    private $saldo;
    static $interest =0.03;
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
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Oefening 8.6 Rekening</title>
    </head>
    <body>
        <h1>
            <?php
            $rek= new Rekening("091-0122401-16");
            print ("Het saldo is: ".$rek->getSaldo() ."<br>");
            $rek->stort(200);
            print ("Het saldo is: ".$rek->getSaldo() ."<br>");
            $rek->voerInterestDoor();
            print ("Het saldo is: ".$rek->getSaldo() ."<br>");
            ?>
        </h1>
    </body>
</html>
