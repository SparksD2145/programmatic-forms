<?php

namespace nobilis\marketing\forms\prebuilt {
    require_once(dirname(__FILE__) . "/../types/Input.php");
    use nobilis\marketing\forms\types\Input;

    class Email extends Input {
        private static $config = [
            "type" => "email",
            "name" => "email",
            "placeholder" => "Email"
        ];

        function __construct() {
            parent::__construct(self::$config);
        }
    }
}