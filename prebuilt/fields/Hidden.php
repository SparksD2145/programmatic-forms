<?php

namespace pgform\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Input.php");
    use pgform\types\Input;

    class Hidden extends Input {
        private static $config = [
            "attributes" => [
                "type" => "hidden"
            ]
        ];

        function __construct($config = null) {
            if (!isset($config)) $config = [];
            $config = array_replace_recursive(self::$config, $config);
            parent::__construct($config);
        }
    }
}