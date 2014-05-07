<?php
class VierOpEenRij{
    private $rijnummer;
    private $kolomnummer;
    private $status;
    
    public function __construct($rijnummer, $kolomnummer, $status){
        $this->rijnummer = $rijnummer;
        $this->kolomnummer = $kolomnummer;
        $this->status = $status;
    }
    public function GetRijnummer(){
        return $this->rijnummer;
    }
    public function GetKolomnummer(){
        return $this->kolomnummer;
    }
    public function GetStatus(){
        return $this->status;
    }
    public function SetRijnummer($rijnummer){
        $this->rijnummer = $rijnummer;
    }
    public function SetKolomnummer($kolomnummer){
        $this->kolomnummer = $kolomnummer;
    }
    public function SetStatus($status){
        $this->status =$status;
    }
}

?>
