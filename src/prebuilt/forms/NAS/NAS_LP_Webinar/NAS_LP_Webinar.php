<?php

namespace pgform\prebuilt {

    use pgform\prebuilt\fields\FirstName;
    use pgform\prebuilt\fields\LastName;
    use pgform\prebuilt\fields\Phone;
    use pgform\prebuilt\fields\Email;
    use pgform\prebuilt\fields\PostalCode;
    use pgform\prebuilt\fields\PrivacyPolicy;
    use pgform\prebuilt\fields\Submit;
    use pgform\prebuilt\groups\InsuranceGroup;
    use pgform\types\Stylesheet;
    use pgform\types\Script;
    use pgform\Form;

    /**
     * NAS Landing Page - Webinar form
     * @package pgform\prebuilt
     */
    class NAS_LP_Webinar extends Form {
        private $directory = 'prebuilt/forms/NAS/NAS_LP_Webinar/';

        /**
         * Default Configuration
         * @var array
         */
        protected $default_config = [
            "attributes" => [
                "class" => "lp-webinar"
            ],
            "submit-text" => null
        ];

        /**
         * NAS_LP_Webinar constructor.
         * @param array|null $config
         */
        function __construct(array $config = null) {
            $this->configuration = array_replace_recursive($this->configuration, $this->default_config);

            if (isset($config)) {
                $this->configuration = array_replace_recursive($this->configuration, $config);
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
                new PostalCode(),
                new InsuranceGroup(),
                new PrivacyPolicy(),
                new Submit(),
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

            parent::__construct($items, $this->configuration);
        }
    }
}
