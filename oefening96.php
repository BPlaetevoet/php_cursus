<?php
session_start();
if (isset($_SESSION["nick"])){
    $nickname = $_SESSION["nick"];
}else {
    $nickname = 'p'.rand(111, 999);
    $_SESSION["nick"]= $nickname;
}
class ChatBericht{
    private $id;
    private $boodschap;
    private $nickname;
    private $datum;
    public function getBoodschap(){
        return $this->boodschap;
    }
    public function setBoodschap($boodschap){
        $this->boodschap = $boodschap;
    }
    public function getNickname(){
        return $this->nickname;
    }
    public function setNickname($nickname){
        $this->nickname = $nickname;
    }
    public function __construct($id, $boodschap, $nickname, $datum){
        $this->id = $id;
        $this->boodschap = $boodschap;
        $this->nickname = $nickname;
        $this->datum = $datum;
    }
    
    
}
class Berichten{
    private $dbConn;
    private $dbUser;
    private $dbPass;
    
    public function __construct(){
        $this->dbConn ="mysql:host=localhost; dbname=cursusphp";
        $this->dbUser = "cursusgebruiker";
        $this->dbPass = "cursuspwd";
}
    public function ToonBerichten(){
        $lijst= array();
        $sql = "select id, nickname, boodschap, datum from chatscript order by 4 DESC";
        $dbc = new PDO($this->dbConn, $this->dbUser, $this->dbPass);
        $result = $dbc->query($sql);
        foreach ($result as $rij){
            $bericht = new ChatBericht($rij["id"], $rij["boodschap"], $rij["nickname"], $rij["datum"]);
            array_push($lijst, $bericht);
        }
        $dbc = null;
        return $lijst;
    }
    public function NieuwBericht($boodschap, $nickname){
        $sql = "insert into chatscript (boodschap, nickname, datum) values('$boodschap', '$nickname', NOW())";
        $dbc = new PDO($this->dbConn, $this->dbUser, $this->dbPass);
        $dbc->exec($sql);
        $dbc = null;
}

}
$bericht = new berichten();
if (isset($_GET["actie"]) && $_GET["actie"]=="toevoegen"){
    $bericht->NieuwBericht( $_POST["bericht"], $_POST["nickname"]);
}
if (isset($_GET["reset"]) && $_GET["reset"]== "1"){
    session_destroy();
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Oefening 9.6 Chatscript</title>
        <style type="text/css">
            .screen {
               margin:20px auto;
               width:80%;
               border:1px solid black;
               border-radius:10px;
               padding:20px;
            }
            .chatbox {
                padding:20px ;
                margin:20px auto;
                width:80%;
                height:100px;
                margin: 0 auto;
                background-color:#c0c0c0;
                border:1px solid gray;
                border-radius:5px;
                color:white;
            }
            .chat {                
                color:green;
                width: 80%;
                line-height:1.14em;
                background-color: #191919;
                border: 1px solid black;
                border-radius:5px;
                padding:1em;
                    
            }
        </style>
    </head>
    <body>
        <div class="screen">
        <h1>Welkom <?php echo $nickname;?></h1>
        uw recentste berichten:<br><br>
        
            <?php
            $data = new Berichten();
            $chatberichten = $data->ToonBerichten();
            if ($chatberichten){
                foreach($chatberichten as $rij){
                    
                    $nickname = $rij->getNickname();
                    $boodschap = $rij->getBoodschap();
                    echo $nickname.' : '.$boodschap.'<br>';
                }
            }else print 'Nog geen berichten';
            ?>
            
        </div>
        <div class="chatbox">
            <form action="oefening96.php?actie=toevoegen" method="post">
                Bericht:
                <input class="chat" type="text" name="bericht"><br><br>
                <input type="hidden" name="nickname" value="<?php print $nickname;?>">
                <input type="submit" value="Verzenden">
            </form>
        </div>
    </body>
</html>

