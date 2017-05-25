<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>タイトル</title>
    </head>
    <body>
        <ul>
            <?php for($i = 1; $i < 10; $i++) { ?>
                <li><?php print '3 x ' . $i . ' = ' . (3 * $i);?></li>
            <?php } ?>
        </ul>
    </body>
</html>