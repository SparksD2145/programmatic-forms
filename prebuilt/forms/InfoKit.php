<?php

namespace pgform\prebuilt {

    use pgform\prebuilt\fields\Country;
    use pgform\prebuilt\fields\FirstName;
    use pgform\prebuilt\fields\LastName;
    use pgform\prebuilt\fields\Phone;
    use pgform\prebuilt\fields\Email;
    use pgform\prebuilt\fields\PrivacyPolicy;
    use pgform\prebuilt\fields\Submit;
    use pgform\prebuilt\groups\AttributionGroup;
    use pgform\prebuilt\groups\InsuranceGroup;
    use pgform\Form;

    class InfoKit extends Form {
        private static $default_config = [
            "attributes" => [
                "class" => "info-kit"
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
                new AttributionGroup(),
                new Country(),
                new PrivacyPolicy(),
                new Submit()
            ];

            parent::__construct($items, $config);
        }
    }
}
