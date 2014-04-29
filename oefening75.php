<?php
session_start()
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
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
        <a href="oefening75.php"><img class="deur<?php print $i;?>" src="images/doorclosed.png"></a>
        <?php } ?>
            <p>Klik <a href="oefening75.php">hier</a> om een nieuw spel te beginnen.</p>
    </body>
</html>