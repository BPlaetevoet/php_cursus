<?php
require_once 'gastenboek_class.php';

class GastenboekLijst {
    private $dbConn;
    private $dbUser;
    private $dbPass;
    
    public function __construct(){
        $this->dbConn ="mysql:host=localhost; dbname=cursusphp";
        $this->dbUser = "cursusgebruiker";
        $this->dbPass = "cursuspwd";
    }
    public function ToonGastenBoek (){
        $lijst = array();
        $sql = "select id, auteur, boodschap, datum from gastenboek order by datum DESC";
        $dbc = new PDO($this->dbConn, $this->dbUser, $this->dbPass);
        $result = $dbc->query($sql);
        foreach ($result as $rij){
            $veld = new GastenBoek($rij["id"], $rij["auteur"], $rij["boodschap"], $rij["datum"]);
            array_push($lijst, $veld);
        }
        $dbc = null;
        return $lijst;
    }
    public function newVeld($auteur, $boodschap){
        $sql = "insert into gastenboek (auteur, boodschap, datum) values ('$auteur ', '$boodschap', NOW())";
        $dbc = new PDO($this->dbConn, $this->dbUser, $this->dbPass);
        $dbc->exec($sql);
        $dbc = null;
    }
    public function ValidateVeld($auteur, $boodschap){
        $fout=0;
        if (empty($auteur)  || (empty($boodschap))) {
            $fout=1;
        }
        if (strlen($boodschap)>200){
            $fout=2;
        }
       
            
        return $fout;
    }
    
    public function GetVeldById($id){
        $sql = "select auteur, boodschap, datum from gastenboek where id=" .$id;
        $dbc = new PDO($this->dbConn, $this->dbUser, $this->dbPass);
        $result = $dbc->query($sql);
        if ($result){
            $rij = $result->fetch();
            if ($rij){
                $veld = new GastenBoek($id, $rij["auteur"], $rij["boodschap"], $rij["datum"]);
                $dbc = null;
                return $veld;
            }else return false;
        }else return false;
    }
    
    public function UpdateVeld($veld){
        $sql = "update gastenboek set auteur = '" .$veld->getAuteur() ."', boodschap =" 
                .$veld->getBoodschap() ."', datum =" .$veld->getDatum ." where id =" .$veld->getId();
        $dbc = new PDO($this->dbConn, $this->dbUser, $this->dbPass);
        $dbc->exec($sql);
        $dbc = null;
     }
     
     public function deleteVeld($id){
         $sql = "delete from gastenboek where id=" .$id;
         $dbc = new PDO($this->dbConn, $this->dbUser, $this->dbPass);
         $dbc->exec($sql);
         $dbc = null;
     }
     
}
?>
