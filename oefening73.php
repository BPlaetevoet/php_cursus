<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tafel van 10</title>
    </head>
    <body>
        <table border="1">
            <tr><td></td>
                <?php for ($i=1; $i<=10; $i++){
                    print '<td>'.$i.'</td>';}?>
            </tr> 
                <?php for ($row=1; $row<=10; $row++){?>
                    <tr><td><?php print $row;?></td>
                <?php for ($kol=1;$kol<=10;$kol++){ ?>
                <td><?php print ($row*$kol)?></td>
                <?php } ?>
                    </tr>
            <?php } ?>
                
                
        </table>
    </body>
</html>