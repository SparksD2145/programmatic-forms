<?php

namespace pgform\forms {

    use pgform\Container;
    use pgform\Form;
    use pgform\fields\FirstName;
    use pgform\fields\LastName;
    use pgform\elements\Input;
    use pgform\groups\Footer;

    /**
     * Demo Form
     * @package pgform\prebuilt
     */
    class Demo extends Form {

        /**
         * @var array
         */
        public $default_config = [
            "attributes" => [
                "class" => "demo"
            ]
        ];

        function __construct(array $config = []) {
            $this->configuration = array_replace_recursive($this->configuration, $this->default_config);
            $this->configuration = array_replace_recursive($this->configuration, $config);

            $items = [
                new Container([
                    new FirstName([
                        "attributes" => [
                            "class" => "half-width"
                        ]
                    ]),
                    new LastName([
                        "attributes" => [
                            "class" => "half-width"
                        ]
                    ])
                ]),
                new Container([
                    new Input([
                        "attributes" => [
                            "type" => "text",
                            "class" => "half-width",
                            "placeholder" => "His Name"
                        ]
                    ]),
                    new Input([
                        "attributes" => [
                            "type" => "text",
                            "class" => "half-width",
                            "placeholder" => "His Name"
                        ]
                    ])
                ]),
                new Input([
                    "attributes" => [
                        "type" => "text",
                        "placeholder" => "Their Name"
                    ]
                ]),
                new Footer()
            ];

            parent::__construct($items, $this->configuration);
        }
    }
}
