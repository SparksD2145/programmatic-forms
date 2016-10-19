<?php

namespace nobilis\forms\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../types/Input.php");
    use nobilis\forms\types\Input;

    class Submit extends Input {
        private static $config = [
            "type" => "submit",
            "value" => "Submit"
        ];

        function __construct($config = null) {
            if (!isset($config)) $config = [];
            $config = array_merge(self::$config, $config);
            parent::__construct($config);
        }
    }
}