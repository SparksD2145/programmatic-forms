<?php

namespace pgforms\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Input.php");
    use pgforms\types\Input;

    class LastName extends Input {
        private static $config = [
            "attributes" => [
                "type" => "text",
                "name" => "last_name",
                "placeholder" => "Last Name"
            ]
        ];

        function __construct($config = null) {
            if (!isset($config)) $config = [];
            $config = array_merge(self::$config, $config);
            parent::__construct($config);
        }
    }
}