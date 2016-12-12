<?php

namespace pgform\prebuilt {
    use pgform\prebuilt\fields\FirstName;
    use pgform\prebuilt\fields\LastName;
    use pgform\prebuilt\fields\Phone;
    use pgform\prebuilt\fields\Email;
    use pgform\prebuilt\groups\AttributionGroup;
    use pgform\prebuilt\groups\InsuranceGroup;
    use pgform\Form;

    class Main extends Form {
        private static $default_config = [
            "attributes" => [
                "class" => "main"
            ]
        ];

        function __construct(array $config = null) {
            if (!isset($config)) {
                $config = self::$default_config;
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
