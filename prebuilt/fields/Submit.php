<?php

namespace pgform\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Input.php");
    use pgform\types\Input;

    class Submit extends Input {
        private static $config = [
            "attributes" => [
                "type" => "submit",
                "value" => "Submit",
                "class" => "submit"
            ]
        ];

        function __construct(array $config = null) {
            if (!isset($config)) $config = [];
            $config = array_replace_recursive(self::$config, $config);
            parent::__construct($config);
        }
    }
}