<?php
 $size = array("10", "20", "30", "40", "50", "60", "70");
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP is fantastisch</title>
        <style type="text/css">
            body{
                width:80%;
                margin:0 auto;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <?php
        for ($i=0; $i <=6; $i++){
            echo "<p style='font-size:".$size[$i]."px;'>PHP is fantastisch</p>";
        }
        for ($i=5; $i >=0; $i--){
            echo "<p style='font-size:".$size[$i]."px';>PHP is fantastisch</p>";
        }
        ?>
    </body>
</html>
