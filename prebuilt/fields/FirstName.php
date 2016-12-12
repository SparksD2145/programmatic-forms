<?php

namespace pgform\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Input.php");
    use pgform\types\Input;

    class FirstName extends Input {
        private static $config = [
            "attributes" => [
                "type" => "text",
                "name" => "first_name",
                "placeholder" => "First Name",
                "required" => true,
                "class" => "first-name",
                "autocomplete" => "given-name"
            ]
        ];

        function __construct($config = null) {
            if (!isset($config)) $config = [];
            $config = array_replace_recursive(self::$config, $config);
            parent::__construct($config);
        }
    }
}