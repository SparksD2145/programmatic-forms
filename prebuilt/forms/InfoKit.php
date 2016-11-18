<?php

namespace pgforms\prebuilt {

    use pgforms\prebuilt\fields\Country;
    use pgforms\prebuilt\fields\FirstName;
    use pgforms\prebuilt\fields\LastName;
    use pgforms\prebuilt\fields\Phone;
    use pgforms\prebuilt\fields\Email;
    use pgforms\prebuilt\fields\PrivacyPolicy;
    use pgforms\prebuilt\fields\Submit;
    use pgforms\prebuilt\groups\AttributionGroup;
    use pgforms\prebuilt\groups\InsuranceGroup;
    use pgforms\Form;

    class InfoKit extends Form {
        private static $default_config = [
            "class" => " info-kit"
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
                new AttributionGroup(),
                new Country(),
                new PrivacyPolicy(),
                new Submit()
            ];

            parent::__construct($items, $config);
        }
    }
}
