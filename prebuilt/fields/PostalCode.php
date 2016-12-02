<?php

namespace pgforms\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Input.php");
    use pgforms\types\Input;

    class PostalCode extends Input {
        private static $config = [
            "attributes" => [
                "type" => "text",
                "name" => "PostalCode",
                "placeholder" => "Zip / Postal Code",
                "class" => "postalcode"
            ]
        ];

        function __construct($config = null) {
            if (!isset($config)) $config = [];
            $config = array_replace_recursive(self::$config, $config);
            parent::__construct($config);
        }
    }
}