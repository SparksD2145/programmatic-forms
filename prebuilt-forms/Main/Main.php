<?php

namespace nobilis\forms\prebuilt {
    use nobilis\forms\prebuilt\fields\FirstName;
    use nobilis\forms\prebuilt\fields\LastName;
    use nobilis\forms\prebuilt\fields\Phone;
    use nobilis\forms\prebuilt\fields\Email;
    use nobilis\forms\prebuilt\fields\InsuranceProvider;
    use nobilis\forms\prebuilt\groups\AttributionGroup;
    use nobilis\forms\prebuilt\groups\InsuranceGroup;
    use nobilis\forms\base\Form;

    class Main extends Form {
        function __construct(array $config = null) {
            $default_name = 'main';

            if (!isset($config) || empty($config['name'])) {
                $config['name'] = $default_name;
            }

            $items = [
                new FirstName(),
                new LastName(),
                new Phone(),
                new Email(),
                new InsuranceGroup(),
                new AttributionGroup()
            ];

            parent::__construct($items, $config);
        }
    }
}
