<?php
if (isset($_GET["actie"]) && $_GET["actie"] == "verwijder"){
    $mlijst = new ModuleLijst();
    $mlijst->deleteModule($_GET["id"]);
}
class ModuleLijst {
    public function getModuleLijst (){
        $dbc = new PDO("mysql:host=localhost;dbname=cursusphp","cursusgebruiker","cursuspwd");
        $sql = "select id, naam, prijs from modules order by naam";
        $result=$dbc->query($sql);
        $dbc=null;
        return $result;
    }
    public function deleteModule($id){
        $dbc= new PDO("mysql:host=localhost;dbname=cursusphp","cursusgebruiker","cursuspwd");
        $sql= "delete from modules where id=" .$id;
        $dbc->exec($sql);
        $dbc=null;
    }
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Entiteiten</title>
    </head>
    <body>
        <h1>Module verwijderen</h1>
        <?php
        $mlijst = new ModuleLijst();?>
        <ul>
            <?php
            $data = new ModuleLijst();
            $lijst =($data->getModuleLijst());
            foreach ($lijst as $rij){
                echo '<li>'.$rij["naam"].' (<a href="modulelijst.php?actie=verwijder&id='.$rij["id"].'">Verwijderen</a>)</li>';
                
            }?>
        </ul>
    </body>
</html>
