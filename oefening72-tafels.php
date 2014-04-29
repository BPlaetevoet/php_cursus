<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tafel van</title>
    </head>
    <body>
        <?php 
        $getal=$_POST["grondgetal"];?>
        <table border="1">
            <tr>
                <td colspan="2">De tafel van <?php print($getal) ;?></td>
            </tr>
            <?php for ($i=1; $i<=10; $i++){ ?>
            <tr><td><?php print ($i.' maal '.$getal) ;?></td>
                <td><?php print ($i*$getal) ;?></td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>