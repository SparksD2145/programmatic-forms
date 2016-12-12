<?php

namespace pgform\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Input.php");
    use pgform\types\Input;

    class Reset extends Input {
        private static $config = [
            "attributes" => [
                "type" => "reset",
                "value" => "Cancel",
                "class" => "reset"
            ]
        ];

        function __construct($config = null) {
            if (!isset($config)) $config = [];
            $config = array_merge(self::$config, $config);
            parent::__construct($config);
        }
    }
}