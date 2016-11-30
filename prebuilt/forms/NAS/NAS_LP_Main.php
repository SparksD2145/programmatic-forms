<?php

namespace pgforms\prebuilt {

    use pgforms\prebuilt\fields\FirstName;
    use pgforms\prebuilt\fields\LastName;
    use pgforms\prebuilt\fields\Phone;
    use pgforms\prebuilt\fields\Email;
    use pgforms\prebuilt\fields\PrivacyPolicy;
    use pgforms\prebuilt\fields\Submit;
    use pgforms\prebuilt\groups\MRIreport;
    use pgforms\prebuilt\groups\AttributionGroup;
    use pgforms\prebuilt\groups\InsuranceGroup;
    use pgforms\Form;

    class NAS_LP_Main extends Form {
        private static $default_config = [
            "attributes" => [
                "class" => "lp-main"
            ],
            "submitButtonText" => null
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
                new MRIreport(),
                new PrivacyPolicy(),
                new Submit([
                    attributes => [
                        "value"=> $config['submitButtonText']
                    ]
                ])
            ];

            parent::__construct($items, $config);
        }
    }
}
