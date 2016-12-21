<?php

namespace pgform\forms {

    use pgform\Container;
    use pgform\fields\Country;
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
        public static $defaults = [
            "attributes" => [
                "class" => "demo"
            ]
        ];

        function __construct(array $config = []) {

            $items = [
                new Country(),
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

            $this->extend_config(self::$defaults);
            parent::__construct($items, $config);
        }
    }
}
