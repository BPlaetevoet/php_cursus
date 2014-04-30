<?php
class Modules {
    public function getModules(){
        $lijst=array();
        $dbc = new PDO("mysql:host=localhost;dbname=cursusphp", "cursusgebruiker", "cursuspwd");
        $resultaten = $dbc->query("select naam, prijs from modules where prijs >".$_POST["min"]." AND prijs<".$_POST["max"]." order by prijs");
        foreach($resultaten as $rij){
            $modules=$rij["naam"]."(".$rij["prijs"]." euro)";
            array_push($lijst, $modules);
        }
        return $lijst;
    }
}

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Oefening 9.1 werken met db</title>
    </head>
    <body>
        <h1>Zoekresultaat</h1>
        <ul>
           <?php $mods =new Modules;
            $modulelijst = ($mods->getModules());
            foreach ($modulelijst as $naam){
                print "<li>".$naam."</li>";
            }
            ?>
        </ul>
            
    </body>
</html>
