<?php

namespace nobilis\marketing\forms\prebuilt {
    require_once(dirname(__FILE__) . '/../prebuilt-fields/FirstName.php');
    require_once(dirname(__FILE__) . '/../prebuilt-fields/LastName.php');
    require_once(dirname(__FILE__) . '/../prebuilt-fields/Email.php');
    require_once(dirname(__FILE__) . '/../prebuilt-fields/Phone.php');
    require_once(dirname(__FILE__) . '/../prebuilt-fields/InsuranceProvider.php');
    require_once(dirname(__FILE__) . '/../base/Form.php');

    use \nobilis\marketing\forms\prebuilt\fields\FirstName;
    use \nobilis\marketing\forms\prebuilt\fields\LastName;
    use \nobilis\marketing\forms\prebuilt\fields\Phone;
    use \nobilis\marketing\forms\prebuilt\fields\Email;
    use \nobilis\marketing\forms\prebuilt\fields\InsuranceProvider;
    use \nobilis\marketing\forms\base\Form;

    class MainForm extends Form {
        function __construct($config = null) {
            $items = [
                new FirstName(),
                new LastName(),
                new Phone(),
                new Email(),
                new InsuranceProvider()
            ];

            parent::__construct($items, $config);
        }
    }
}

?>