<?php

namespace nobilis\marketing\forms\prebuilt {
    require_once(dirname(__FILE__) . "/../types/Input.php");
    use nobilis\marketing\forms\types\Input;

    class Phone extends Input {
        private static $config = [
            "type" => "text",
            "name" => "phone",
            "placeholder" => "Phone Number"
        ];

        function __construct() {
            parent::__construct(self::$config);
        }
    }
}