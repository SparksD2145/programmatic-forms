<?php
    require_once(dirname(__FILE__) . '/forms.autoload.php');
    use \nobilis\marketing\forms\prebuilt\Main as MainForm;
?>

<!doctype html>
<html>
    <head>
        <title>Demonstration Page</title>
        <link rel="stylesheet" type="text/css" href="forms-core.css" />
    </head>
    <body>
        <?php new MainForm() ?>
    </body>
</html>