<?php
session_start();
class nummerGenerator {
    public function nummerConstruct() {
        
        if (!isset($_SESSION["getal"])){
        $_SESSION["getal"] = rand(1, 100);
        $_SESSION["count"]=0;
        } else {
            $_SESSION["count"]++ ;
        }
        if ($_SESSION["count"] == 10){
           $_SESSION["getal"]= rand(1, 100);
           $_SESSION["count"]=0;
        }
        return $_SESSION["getal"];
    }
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Random getal</title>
    </head>
    <body>
        <h1>
            <?php
            $randje = new nummerGenerator;
            print ($randje->nummerConstruct());
            
            ?>
        </h1>
    </body>
</html>
