<?php
    require_once(dirname(__FILE__) . '/forms.autoload.php');
    use \nobilis\forms\prebuilt\Main as MainForm;
?>

<!doctype html>
<html>
    <head>
        <title>Demonstration Page</title>
        <link rel="stylesheet" type="text/css" href="forms-core.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>
    <body>
        <?php new MainForm() ?>
    </body>
</html>
