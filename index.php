<?php
require(dirname(__FILE__) . '/prebuilt/FirstName.php');
require(dirname(__FILE__) . '/prebuilt/InsuranceProvider.php');
require(dirname(__FILE__) . '/base/Form.php');

use \nobilis\marketing\forms\prebuilt\FirstName;
use \nobilis\marketing\forms\prebuilt\InsuranceProvider;
use \nobilis\marketing\forms\base\Form;
?>

<!doctype html>
<html>
    <head>
        <title>Demonstration Page</title>
    </head>
    <body>
        <?php
            $testing_form = new Form(array(
                new FirstName(),
                new InsuranceProvider()
            ));
        ?>
    </body>
</html>