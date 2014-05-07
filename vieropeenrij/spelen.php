<?php
if (isset($_GET["kleur"])){
   $kleur= $_GET["kleur"];
}else {
    header('location: http://localhost/PhpProject1/vieropeenrij/kleurkeuze.php');
}
require_once 'vieropeenrij_class.php';

Class SpelBord {
    private $DbConn;
    private $DbUser;
    private $DbPass;
    
    public function __construct(){
        $this->DbConn ="mysql:host=localhost; dbname=cursusphp";
        $this->DbUser ="cursusgebruiker";
        $this->DbPass ="cursuspwd";
    }
    public function ToonSpelBord (){
        $vakken = array();
        $sql ="select rijnummer, kolomnummer, status from vieropeenrij_spelbord";
        $dbc = new PDO($this->DbConn, $this->DbUser, $this->DbPass);
        $result= $dbc->query($sql);
        foreach ($result as $rij){
           $vak = new VierOpEenRij($rij["rijnummer"], $rij["kolomnummer"], $rij["status"]); 
           array_push($vakken, $vak);
        }
        $dbc = null;
        return $vakken;        
    }
    public function SteekMunt($kolomnummer, $status){
        $sql = "update vieropeenrij_spelbord set status= '$status' 
                where status=0 and kolomnummer='$kolomnummer' order by rijnummer DESC LIMIT 1"; 
        $dbc = new PDO($this->DbConn, $this->DbUser, $this->DbPass);
        $dbc->exec($sql);
        $dbc = null;
    }
    public function WisSpel(){
        $sql = "UPDATE vieropeenrij_spelbord set status=0 WHERE status>0 ";
        $dbc = new PDO($this->DbConn, $this->DbUser, $this->DbPass);
        $dbc->exec($sql);
        $dbc = null;
    }
}

$actie = new SpelBord();
if (isset ($_GET["zet"])){
    $actie->SteekMunt($_GET["zet"], $_GET["kleur"]);
    
}
if (isset($_GET["reset"]) && $_GET["reset"]=="1"){
    $actie->WisSpel();
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Vier op een rij</title>
        <style type="text/css">
            img {
                margin:0;
                padding:0;
                vertical-align: text-bottom;
                display: inline-block;
            }
            .spelbord {
                background-color:#24246b;
                width:476px;
            }
        </style>
    </head>
    <body>
        <h1>Vier op een rij</h1>
        <?php
        $spel = new SpelBord();
        $vakken = $spel->ToonSpelBord();
        ?>
        <br><br>
        <div class="spelbord">
        <?php  
        $i=0;
        foreach ($vakken as $vak){
          $rijnummer = $vak->GetRijNummer();
          $kolomnummer = $vak->GetKolomnummer();
          $status = $vak->GetStatus();
          
          
              $i++;
              if (($i-1) % 7 ==0){
                  echo '<br>';
              }

                 switch ($status):
                     case 0:
                         echo '<a href="spelen.php?kleur='.$kleur.'&zet='.$kolomnummer.'"><img src="../images/emptyslot.png"></a>';
                         break;
                     case 1:
                         echo '<a href="spelen.php?kleur='.$kleur.'&zet='.$kolomnummer.'"><img src="../images/yellowslot.png"></a>';
                        break;
                     case 2:
                         echo '<a href="spelen.php?kleur='.$kleur.'&zet='.$kolomnummer.'"><img src="../images/redslot.png"></a>';
                         break;
                 endswitch;
                 
              
        }
        ?>
        </div>
        <br>
        <a href="spelen.php?kleur=<?php echo $kleur;?>">Verniew bord</a><br>
        <a href="spelen.php?reset=1">Spel herstarten</a>
    </body>
</html>