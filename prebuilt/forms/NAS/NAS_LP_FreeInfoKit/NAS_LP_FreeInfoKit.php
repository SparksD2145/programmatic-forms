<?php

namespace pgform\prebuilt {

    use pgform\prebuilt\fields\FirstName;
    use pgform\prebuilt\fields\LastName;
    use pgform\prebuilt\fields\Phone;
    use pgform\prebuilt\fields\Email;
    use pgform\prebuilt\fields\PrivacyPolicy;
    use pgform\prebuilt\fields\Submit;
    use pgform\prebuilt\groups\AddressGroup;
    use pgform\prebuilt\groups\InsuranceGroup;
    use pgform\types\Stylesheet;
    use pgform\types\Script;
    use pgform\Form;

    class NAS_LP_FreeInfoKit extends Form {
        private $directory = 'prebuilt/forms/NAS/NAS_LP_FreeInfoKit/';
        private static $default_config = [
            "attributes" => [
                "class" => "lp-freeinfokit"
            ],
            "submit-text" => null
        ];

        function __construct(array $config = null) {
            if (!isset($config)) {
                $config = self::$default_config;
            } else {
                $config = array_replace_recursive(self::$default_config, $config);
            }

            $items = [
                new FirstName([
                    "attributes" => [
                        "class"=> "half-width first-name"
                    ]
                ]),
                new LastName([
                    "attributes" => [
                        "class"=> "half-width last-name"
                    ]
                ]),
                new Phone(),
                new Email(),
                new InsuranceGroup(),
                new AddressGroup(),
                new PrivacyPolicy(),
                new Submit([
                    "attributes" => [
                        "value"=> $config['submit-text']
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
