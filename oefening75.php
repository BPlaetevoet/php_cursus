<?php
session_start();
if (isset($_GET["reset"])){
    if ($_GET["reset"]==1) unset ($_SESSION["deur"], $_SESSION["teller"]);
}
if (!isset ($_SESSION["teller"])){
    $_SESSION["teller"]=0;
}
if (!isset($_SESSION["deur"])){
    $_SESSION["deur"]=array();
    for ($i=1;$i<=7; $i++)$_SESSION["deur"][$i]=0;
    $_SESSION["schattendeur"]=  rand(1, 7);
   }

if (isset($_GET["keuze"])){
    $_SESSION["teller"]+=1;
    $keuzenr = $_GET["keuze"];
    if ($keuzenr == $_SESSION["schattendeur"]){
        $_SESSION["deur"][$keuzenr]=2;
    }else{
        $_SESSION["deur"][$keuzenr]=1;
    }
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>deurspelletje</title>
        <script type="text/css">

        </script>
    </head>
    <body>
        <h1>Kies een deur</h1>
        <?php for ($i=1; $i <=7; $i++){ 
            if (!isset($_GET["keuze"]) || ($_SESSION["schattendeur"] !=$_GET["keuze"]) ){?>
                <a href="oefening75.php?keuze=<?php print($i);?>">
           <?php }
         
        if ($_SESSION["deur"][$i]==0){ ?>
           <img src="images/doorclosed.png">
        <?php } elseif ($_SESSION["deur"][$i]==1){?>
            <img src="images/dooropen.png">
        <?php } elseif ($_SESSION["deur"][$i]==2){?>
            <img src="images/doortreasure.png">
            <?php } if (!isset($_GET["keuze"]) || ($_SESSION["schattendeur"] != $_GET["keuze"])){
                print '</a>';}?>
       
        <?php } ?>
       <?php if (isset($_GET["keuze"])){
           if ($_SESSION["schattendeur"]==$_GET["keuze"]){?>
        <p>Proficiat u had <?php print $_SESSION["teller"];?> pogingen nodig </p>
        <?php } 
       }
        ?>
        <p>Klik <a href="oefening75.php?reset=1">hier</a> om een nieuw spel te spelen.
       
    </body>
</html>