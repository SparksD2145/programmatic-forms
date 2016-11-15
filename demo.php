<?php
    require_once(dirname(__FILE__) . '/autolaunch.php');
    use pgforms\prebuilt\Main as MainForm;
?>

<!doctype html>
<html>
    <head>
        <title>Demonstration Page</title>
        <link rel="stylesheet" type="text/css" href="demo.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>
    <body>
        <?php new MainForm() ?>
    </body>
</html>
