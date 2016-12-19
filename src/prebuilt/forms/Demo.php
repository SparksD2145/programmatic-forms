<?php

namespace pgform\prebuilt {
    use pgform\Form;
    use pgform\prebuilt\fields\FirstName;
    use pgform\prebuilt\fields\LastName;
    use pgform\types\Input;

    /**
     * Demo Form
     * @package pgform\prebuilt
     */
    class Demo extends Form {

        /**
         * @var array
         */
        protected $default_config = [
            "attributes" => [
                "class" => "demo"
            ]
        ];

        function __construct(array $config = null) {
            $this->configuration = array_replace_recursive($this->configuration, $this->default_config);

            if (isset($config)) {
                $this->configuration = array_replace_recursive($this->configuration, $config);
            }

            $items = [
                new FirstName([
                    "class" => "half-width"
                ]),
                new LastName([
                    "class" => "half-width"
                ]),
                new Input([
                    "type" => "text",
                    "placeholder" => "His Name"
                ]),
                new Input([
                    "type" => "text",
                    "placeholder" => "Her Name"
                ])
            ];

            parent::__construct($items, $this->configuration);
        }
    }
}
