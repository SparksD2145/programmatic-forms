<?php

namespace nobilis\marketing\forms\prebuilt {
    require_once(dirname(__FILE__) . '/../forms.autoload.php');

    use nobilis\marketing\forms\prebuilt\fields\FirstName;
    use nobilis\marketing\forms\prebuilt\fields\LastName;
    use nobilis\marketing\forms\prebuilt\fields\Phone;
    use nobilis\marketing\forms\prebuilt\fields\Email;
    use nobilis\marketing\forms\prebuilt\fields\InsuranceProvider;
    use nobilis\marketing\forms\prebuilt\groups\Attribution as AttributionGroup;
    use nobilis\marketing\forms\base\Form;

    class Main extends Form {
        function __construct($config = null) {
            $items = [
                new FirstName(),
                new LastName(),
                new Phone(),
                new Email(),
                new InsuranceProvider(),
                new AttributionGroup()
            ];

            parent::__construct($items, $config);
        }
    }
}