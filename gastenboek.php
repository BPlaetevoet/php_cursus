<?php
require_once 'gastenboek_class.php';
require_once 'gb_lijst_class.php';

$bericht = new GastenboekLijst();
if (isset($_GET["actie"]) && $_GET["actie"]=="toevoegen"){
    $validate = ($bericht->ValidateVeld($_POST["auteur"], $_POST["boodschap"]));
    if ($validate==0){
        $bericht->newVeld($_POST["auteur"], $_POST["boodschap"]);
    }else{
        switch ($validate) {
            case (1): print 'U hebt een veld niet ingevuld !';
                break;
            case (2): print 'boodschap te lang!';
                break;
            default: print 'er ging iets mis';
                break;
        }
        
    }   
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>gastenboek</title>
        <style type="text/css">
            li {
                border-bottom: 1px solid black;
            }
        </style>
    </head>
    <body>
        <h1>Berichten</h1>
        <?php
        $veldlijst = new GastenboekLijst();
        $tabel = $veldlijst->ToonGastenBoek();
        ?>
        <ul>
            <?php 
            foreach($tabel as $veld){
                $veldauteur = $veld->getAuteur();
                $veldboodschap = $veld->getBoodschap();
                print ("<li><strong>Auteur: </strong>" .$veldauteur."<br><br>");
                print ($veldboodschap."<br><br>");

            }
            ?>
            </ul>
        <h1>Bericht toevoegen</h1>
        <form action="gastenboek.php?actie=toevoegen" method="post">
            <strong>Auteur: </strong>
            <input type="text" name="auteur"><br><br>
            <strong>Boodschap:</strong><br>
            <textarea cols="50" rows="5" name="boodschap"></textarea><br><br>
            <input type="submit" value="Verzenden">
        </form>
    </body>
</html>
