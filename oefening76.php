<?php
session_start();
if (isset($_GET["reset"])){
    if ($_GET["reset"]==1){ unset ($_SESSION["aantal"]);
}
}
if (isset($_GET["aantal"])){
    $_SESSION["aantal"]=$_GET["aantal"];
}
if (!isset ($_SESSION["aantal"])){
    $_SESSION["aantal"]=7;
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Lucifer-spel</title>
        <style>
            img {
                float:left;
            }
            .clear {
                padding-top:20px;
                clear:both;
            }
        </style>
    </head>
    <body>
        <h1>Luciferspel</h1>
        <?php
        $aantal=$_SESSION["aantal"];
        for ($i=1; $i <=$aantal; $i++){?>
            <img src="images/lucifer.png">
        <?php }  if ($aantal != 0){?>
            <div class="clear">
                <a href="oefening76.php?aantal=<?php print $aantal-1 ?>">  
            <input type="button" value="1 lucifer wegnemen"></a>
                <a href="oefening76.php?aantal=<?php print $aantal-2 ?>">
            <input type="button" value="2 lucifers wegnemen"></a>
            </div>
        <?php } else print 'Game over : alle lucifers zijn weg';?>
            <p>Klik <a href="oefening76.php?reset=1">hier</a> om een nieuw spel te starten.</p>
            
    </body>
</html>