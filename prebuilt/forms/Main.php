<?php

namespace pgforms\prebuilt {
    use pgforms\prebuilt\fields\FirstName;
    use pgforms\prebuilt\fields\LastName;
    use pgforms\prebuilt\fields\Phone;
    use pgforms\prebuilt\fields\Email;
    use pgforms\prebuilt\fields\InsuranceProvider;
    use pgforms\prebuilt\groups\AttributionGroup;
    use pgforms\prebuilt\groups\InsuranceGroup;
    use pgforms\Form;

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
