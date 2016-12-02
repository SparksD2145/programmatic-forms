<?php

namespace pgforms\prebuilt {

    use pgforms\prebuilt\fields\FirstName;
    use pgforms\prebuilt\fields\LastName;
    use pgforms\prebuilt\fields\Phone;
    use pgforms\prebuilt\fields\Email;
    use pgforms\prebuilt\fields\PrivacyPolicy;
    use pgforms\prebuilt\fields\Submit;
    use pgforms\prebuilt\groups\Address;
    use pgforms\prebuilt\groups\AttributionGroup;
    use pgforms\prebuilt\groups\InsuranceGroup;
    use pgforms\types\Stylesheet;
    use pgforms\types\Script;
    use pgforms\Form;

    class NAS_LP_FreeInfoKit extends Form {
        private $directory = 'prebuilt/forms/NAS/NAS_LP_FreeInfoKit/';
        private static $default_config = [
            "attributes" => [
                "class" => "lp-freeinfokit"
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
                new InsuranceGroup(),
                new Address(),
                new PrivacyPolicy(),
                new Submit([
                    attributes => [
                        "value"=> $config['submitButtonText']
                    ]
                ]),
                new Stylesheet([
                    "attributes" => [
                        "href" => $this->directory . 'NAS_LP_FreeInfoKit.css'
                    ]
                ]),
                new Script([
                    "attributes" => [
                        "src" => $this->directory . 'NAS_LP_FreeInfoKit.js'
                    ]
                ]),
            ];

            parent::__construct($items, $config);
        }
    }
}
