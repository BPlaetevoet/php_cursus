<?php
class Module {
private $id;
private $naam;
private $prijs;
public function __construct($id, $naam, $prijs) {
$this->id = $id;
$this->naam = $naam;
$this->prijs = $prijs;
}
public function getId() {
return $this->id;
}
public function getNaam() {
return $this->naam;
}
public function getPrijs() {
return $this->prijs;
}
}
class ModuleLijst {
public function getLijst() {
$lijst = array();
$dbh = new PDO("mysql:host=localhost;dbname=cursusphp",
"cursusgebruiker", "cursuspwd");
$sql = "select id, naam, prijs from modules order by naam";
$resultSet = $dbh->query($sql);
foreach ($resultSet as $rij) {
$module = new Module($rij["id"], $rij["naam"], $rij["prijs"]);
array_push($lijst, $module);
}
$dbh = null;
return $lijst;
}
public function deleteModule($id) {
$dbh = new PDO("mysql:host=localhost;dbname=cursusphp",
"cursusgebruiker", "cursuspwd");
$sql = "delete from modules where id = " . $id;
$dbh->exec($sql);
$dbh = null;
}
}
$modLijst = new ModuleLijst();
if (isset($_GET["action"]) && $_GET["action"] == "verwijder") {
$modLijst->deleteModule($_GET["id"]);
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset=utf-8>
<title>Modules</title>
</head>
<body>
<h1>Modules</h1>
<?php
$tab = $modLijst->getLijst();
?>
<ul>
<?php
foreach ($tab as $module) {
$moduleNaam = $module->getNaam();
$moduleId = $module->getId();
print("<li>" . $moduleNaam . " (<a
href=\"modules.php?action=verwijder&id=" .
$moduleId . "\">Verwijderen</a>) </li>");
}
?>
</ul>
</body>
</html>