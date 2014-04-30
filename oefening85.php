<?php
class Personen {
    private $voornaam;
    private $familienaam;
    
    public function __construct($vnaam, $fnaam){
        $this->voornaam = $vnaam;
        $this->familienaam = $fnaam;
    }
    public function getVollNaam(){
        $vollnaam = $this->voornaam .' '.$this->familienaam ;
        return $vollnaam;
    }
}
class Cursist extends Personen {
    private $cursusaantal;
    public function __construct($vnaam, $fnaam, $curaantal){
        parent::__construct($vnaam, $fnaam);
        $this->cursusaantal=$curaantal;
    }
    public function getAantalCursussen(){
    return $this->cursusaantal;
    }
    
}
class Medewerker extends Personen {
    private $begeleidaantal;
    public function __construct($vnaam, $fnaam, $aantal){
        parent::__construct($vnaam, $fnaam);
        $this->begeleidaantal=$aantal;
    }
    public function getAantalCursisten(){
        return $this->begeleidaantal;
    }
}
$cursist=new Cursist("Peeters", "Jan", 3);
$medewerker=new Medewerker("Janssens", "Tom", 8);

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Oefening 8.4</title>
    </head>
    <body>
        <h1>Namen</h1>
        <ul>
            <li><?php print($cursist->getVollNaam() ." volgt ".$cursist->getAantalCursussen(). " cursus(sen)");?></li>
            <li><?php print($medewerker->getVollNaam()." begeleidt ".$medewerker->getAantalCursisten()." cursist(en)");?></li>
        </ul>
    </body>
</html>
