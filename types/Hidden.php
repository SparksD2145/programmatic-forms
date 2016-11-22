<?php

namespace pgforms\prebuilt\fields {
    require_once(dirname(__FILE__) . "/Input.php");
    use pgforms\types\Input;

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