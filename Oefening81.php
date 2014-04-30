<?php
class Thermometer{
    private $minimum = -50;
    private $maximum = 100;
    private $temperatuur;
    public function __construct($g){
        if (($g < $this->minimum) || ($g > $this->maximum)){
            $this->temperatuur='ongeldige invoer';
        }else {
        $this->temperatuur=$g;
        }
    }
    public function verhoogTemperatuur($aantal){
        $this->temperatuur += $aantal;
    }
    public function verlaagTemperatuur($aantal){
        $this->temperatuur -= $aantal;
    }
    public function getTemperatuur(){
        if (($this->temperatuur >$this->minimum) && ($this->temperatuur < $this->maximum)){
        return $this->temperatuur;
        }else {
            return 'ongeldig';
        }
    }
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Oefening 8.1 Thermometer</title>
    </head>
    <body>
        <h1>Oefening 8.1 de thermometer</h1>
        de temperatuur is :
            <?php $temp = new Thermometer(45);
            print ($temp->getTemperatuur());
            ?>
        <br>
        na het verhogen met 5° is de temperatuur :
        <?php $temp->verhoogTemperatuur(5);
        print ($temp->getTemperatuur());
        ?>
        <br>
        Na het verlagen met 8° is de temperatuur :
        <?php $temp->verlaagTemperatuur(8);
        print ($temp->getTemperatuur());
        ?>
        
    </body>
</html>
