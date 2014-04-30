<?php
class Personen {
    private $voornaam;
    private $familienaam;
    
    public function setVoornaam($naam){
        $this->voornaam = $naam;
    }
    public function setFamilienaam($naam){
        $this->familienaam = $naam;
    }
    public function getVollNaam(){
        $vollnaam = $this->voornaam .' '.$this->familienaam ;
        return $vollnaam;
    }
}
class Cursist extends Personen {
    private $cursusaantal;
    public function setAantalCursussen($a){
        $this->cursusaantal=$a;
    }
    
}
class Medewerker extends Personen {
    private $begeleidaantal;
    public function setAantalBegeleid($a){
        $this->begeleidaantal=$a;
    }
}
$cursist=new Cursist();
$medewerker=new Medewerker();
$cursist->setFamilienaam("Peeters");
$cursist->setVoornaam("Jan");
$medewerker->setFamilienaam("Janssens");
$medewerker->setVoornaam("Tom");
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
            <li><?php print($cursist->getVollNaam());?></li>
            <li><?php print($medewerker->getVollNaam());?></li>
        </ul>
    </body>
</html>
