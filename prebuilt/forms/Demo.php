<?php

namespace pgforms\prebuilt {
    use pgforms\Form;
    use pgforms\prebuilt\fields\FirstName;
    use pgforms\prebuilt\fields\LastName;
    use pgforms\types\Input;

    class Demo extends Form {
        private static $default_config = [
            "attributes" => [
                "class" => "demo"
            ]
        ];

        function __construct(array $config = null) {
            if (!isset($config)) {
                $config = self::$default_config;
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

            parent::__construct($items, $config);
        }
    }
}
