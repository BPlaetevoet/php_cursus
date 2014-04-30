<?php
class Personenlijst {
    public function getLijst(){
        $lijst=array();
        $dbh = new PDO("mysql:host=localhost;dbname=cursusphp","cursusgebruiker", "cursuspwd");
        $resultset = $dbh->query("select familienaam, voornaam from personen");
        foreach ($resultset as $rij) {
            $naam = $rij["familienaam"] .", ".$rij["voornaam"];
            array_push($lijst, $naam);
        }
        $dbh = null;
        sort($lijst);
        return $lijst;
    }
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Databanken introductie</title>
    </head>
    <body>
        <?php
        $pl = new Personenlijst();
        $tab = $pl->getLijst();
        ?>
        <ul>
            <?php
                    foreach ($tab as $naam) {
                       print ("<li>". $naam ."</li>");
                    }
            ?>
        </ul>
    </body>
</html>