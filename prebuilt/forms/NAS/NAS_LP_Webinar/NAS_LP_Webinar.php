<?php

namespace pgforms\prebuilt {

    use pgforms\prebuilt\fields\FirstName;
    use pgforms\prebuilt\fields\LastName;
    use pgforms\prebuilt\fields\Phone;
    use pgforms\prebuilt\fields\Email;
    use pgforms\prebuilt\fields\PostalCode;
    use pgforms\prebuilt\fields\PrivacyPolicy;
    use pgforms\prebuilt\fields\Submit;
    use pgforms\prebuilt\groups\AttributionGroup;
    use pgforms\prebuilt\groups\InsuranceGroup;
    use pgforms\types\Stylesheet;
    use pgforms\types\Script;
    use pgforms\Form;

    class NAS_LP_Webinar extends Form {
        private $directory = 'prebuilt/forms/NAS/NAS_LP_Webinar/';
        private static $default_config = [
            "attributes" => [
                "class" => "lp-webinar"
            ],
            "submitButtonText" => null
        ];

        function __construct(array $config = null) {
            if (!isset($config)) {
                $config = self::$default_config;
            } else {
                $config = array_replace_recursive(self::$default_config, $config);
            }

            $items = [
                new FirstName([
                    attributes => [
                        "class"=> "half-width first-name"
                    ]
                ]),
                new LastName([
                    attributes => [
                        "class"=> "half-width last-name"
                    ]
                ]),
                new Phone(),
                new Email(),
                new PostalCode(),
                new InsuranceGroup(),
                new PrivacyPolicy(),
                new Submit([
                    attributes => [
                        "value"=> $config['submitButtonText']
                    ]
                ]),
                new Stylesheet([
                    "attributes" => [
                        "href" => $this->directory . 'NAS_LP_Webinar.css'
                    ]
                ]),
                new Script([
                    "attributes" => [
                        "src" => $this->directory . 'NAS_LP_Webinar.js'
                    ]
                ]),
            ];

            parent::__construct($items, $config);
        }
    }
}
