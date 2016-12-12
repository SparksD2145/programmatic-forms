<?php

namespace pgform\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Input.php");
    use pgform\types\Input;

    class Phone extends Input {
        private static $config = [
            "attributes" => [
                "type" => "tel",
                "name" => "phone",
                "placeholder" => "Phone Number",
                "required" => true,
                "class" => "phone",
                "autocomplete" => "tel",
                "inputmode" => "tel"
            ]
        ];

        function __construct($config = null) {
            if (!isset($config)) $config = [];
            $config = array_merge(self::$config, $config);
            parent::__construct($config);
        }
    }
}