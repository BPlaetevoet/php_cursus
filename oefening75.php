<?php
session_start();
if ($_GET["reset"]==1) unset ($_SESSION["deur"]);
if (!isset($_SESSION["deur"])){
    $_SESSION["deur"]=array();
    for ($i=1;$i<=7; $i++)$_SESSION["deur"][$i]=0;
    $_SESSION["schattendeur"]=  rand(1, 7);
}
if (isset($_GET["keuze"])){
    $keuzenr = $_GET["keuze"];
    if ($keuzenr == $_SESSION["schattendeur"]){
        $_SESSION["deur"]["keuzenr"]=2;
    }else{
        $_SESSION["deur"]["keuzenr"]=1;
    }
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>deurspelletje</title>
        <script type="text/css">
        img {
            float:left;           
        }
        </script>
    </head>
    <body>
        <h1>Kies een deur</h1>
        <?php for ($i=1; $i <=7; $i++){ ?>
        <a href="oefening75.php?kiesdeur=<?php print($i);?>">
        <?php
        if ($_SESSION["deur"][$i]==0){ ?>
           <img src="images/doorclosed.png">
        <?php } elseif ($_SESSION["deur"][$i]==1){?>
            <img src="images/dooropen.png">
        <?php } elseif ($_SESSION["deur"][$i]==2){?>
            <img src="images/doortreasure.png">
            <?php } ?>
        </a>
        <?php } ?>
        <p>Klik <a href="oefening75.php?reset=1">hier</a> om een nieuw spel te spelen.
       
    </body>
</html>