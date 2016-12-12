<?php

namespace pgform\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Input.php");
    use pgform\types\Input;

    class Email extends Input {
        private static $config = [
            "attributes" => [
                "type" => "email",
                "name" => "email",
                "placeholder" => "Email",
                "required" => true,
                "class" => "email",
                "autocomplete" => "email",
                "inputmode" => "email"
            ]
        ];

        function __construct($config = null) {
            if (!isset($config)) $config = [];
            $config = array_merge(self::$config, $config);
            parent::__construct($config);
        }
    }
}