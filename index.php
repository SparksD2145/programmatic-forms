<?php
require_once(dirname(__FILE__) . '/prebuilt-forms/Main.php');
use \nobilis\marketing\forms\prebuilt\MainForm;
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