<?php

namespace pgforms\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Input.php");
    use pgforms\types\Input;

    class FirstName extends Input {
        private static $config = [
            "attributes" => [
                "type" => "text",
                "name" => "first_name",
                "placeholder" => "First Name",
                "required" => true,
                "class" => "first-name"
            ]
        ];

        function __construct($config = null) {
            if (!isset($config)) $config = [];
            $config = array_replace_recursive(self::$config, $config);
            parent::__construct($config);
        }
    }
}