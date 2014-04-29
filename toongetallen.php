<?php require_once 'GetallenReeksMaker.php'?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Getallenreeks</title>
    </head>
    <body>
        <?php
        $getallen = new GetallenReeksMaker();
        $row =($getallen->getReeks());
        echo "<table border='1'><tbody><tr>";
        foreach ($row as $value) {
            echo "<td>".$value."</td>";
            }
            echo "</tr></tbody></table>"
        ?>
    </body>
</html>
