<?php
    require_once(dirname(__FILE__) . '/autoload.php');
?>

<!doctype html>
<html>
    <head>
        <title>Demonstration Page</title>
        <link rel="stylesheet" type="text/css" href="demo.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>
    <body>
        <?php new \pgform\prebuilt\Demo() ?>
    </body>
</html>
