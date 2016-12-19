<?php

namespace pgform\prebuilt {

    use pgform\prebuilt\fields\FirstName;
    use pgform\prebuilt\fields\LastName;
    use pgform\prebuilt\fields\Phone;
    use pgform\prebuilt\fields\Email;
    use pgform\prebuilt\fields\PostalCode;
    use pgform\prebuilt\fields\PrivacyPolicy;
    use pgform\prebuilt\fields\Submit;
    use pgform\prebuilt\groups\MRIreport;
    use pgform\prebuilt\groups\InsuranceGroup;
    use pgform\types\Stylesheet;
    use pgform\types\Script;
    use pgform\Form;

    /**
     * NAS Landing Page - Main form
     * @package pgform\prebuilt
     */
    class NAS_LP_Main extends Form {
        private $directory = 'prebuilt/forms/NAS/NAS_LP_Main/';

        /**
         * Default configuration
         * @var array
         */
        protected $default_config = [
            "attributes" => [
                "class" => "lp-main"
            ],
            "submit-text" => null
        ];

        /**
         * NAS_LP_Main constructor.
         * @param array|null $config
         */
        function __construct(array $config = null) {
            $this->configuration = array_replace_recursive($this->configuration, $this->default_config);

            if (isset($config)) {
                $this->configuration = array_replace_recursive($this->configuration, $config);
            }

            $items = [
                new PostalCode(),
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
                new MRIreport(),
                new PrivacyPolicy(),
                new Submit([
                    "attributes" => [
                        "value"=> $this->configuration['submit-text']
                    ]
                ]),
                new Stylesheet([
                    "attributes" => [
                        "href" => $this->directory . 'NAS_LP_Main.css'
                    ]
                ]),
                new Script([
                    "attributes" => [
                        "src" => 'lib/mask.js'
                    ]
                ]),
                new Script([
                    "attributes" => [
                        "src" => $this->directory . 'NAS_LP_Main.js'
                    ]
                ])
            ];

            parent::__construct($items, $this->configuration);
        }
    }
}
