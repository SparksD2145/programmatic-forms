<?php

namespace pgforms\prebuilt {
    use pgforms\prebuilt\fields\FirstName;
    use pgforms\prebuilt\fields\LastName;
    use pgforms\prebuilt\fields\Phone;
    use pgforms\prebuilt\fields\Email;
    use pgforms\prebuilt\groups\AttributionGroup;
    use pgforms\prebuilt\groups\InsuranceGroup;
    use pgforms\Form;

    class Main extends Form {
        private static $default_config = [
            "class" => " main"
        ];

        function __construct(array $config = null) {
            if (!isset($config)) {
                $config = self::$default_config;
            } else if (!isset($config['class'])) {
                $config['class'] = self::$default_config['class'];
            } else {
                $config['class'] .= self::$default_config['class'];
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
