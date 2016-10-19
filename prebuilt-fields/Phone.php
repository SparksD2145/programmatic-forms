<?php

namespace nobilis\forms\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../types/Input.php");
    use nobilis\forms\types\Input;

    class Phone extends Input {
        private static $config = [
            "type" => "text",
            "name" => "phone",
            "placeholder" => "Phone Number"
        ];

        function __construct($config = null) {
            if (!isset($config)) $config = [];
            $config = array_merge(self::$config, $config);
            parent::__construct($config);
        }
    }
}