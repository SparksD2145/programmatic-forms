<?php

namespace pgforms\prebuilt {
    use pgforms\Form;
    use pgforms\prebuilt\fields\FirstName;
    use pgforms\prebuilt\fields\LastName;
    use pgforms\types\Input;

    class Demo extends Form {
        private static $default_config = [
            "class" => " demo"
        ];

        function __construct(array $config = null) {
            if (!isset($config)) {
                $config = self::$default_config;
            } else if (!isset($config['class'])) {
                $config['class'] = self::$default_config['class'];
            } else {
                $config['class'] .= self::$default_config['class'];
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
                ]),
                new Su
            ];

            parent::__construct($items, $config);
        }
    }
}
