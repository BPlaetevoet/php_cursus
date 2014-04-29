<?php
session_start();
if (!empty($_POST["kleur"])){
    setcookie("bg_kleur", $_POST["kleur"],  time()+1200);
    $kleur = $_POST["kleur"];
}else{
    $kleur = $_COOKIE["bg_kleur"];
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>kleur veranderen</title>
    <style type="text/css">
        body{
            background-color:<?php echo $kleur; ?> ;
        }
    </style>
</head> 
<body>
    <form action="oefening55.php" method="post">
        <label for="kleur">Kies uw kleur</label>
        <select name="kleur">
            <option value="red">Rood</option>
            <option value="white">Wit</option>
            <option value="blue">Blauw</option>
            <option value="yellow">Geel</option>
            <option value="green">Groen</option>
        </select>
        <input type="submit" value="OK">
    </form>
    <a href="oefening55.php">Klik hier om de pagina te vernieuwen.</a>
   
</body>
</html>