<?php

namespace nobilis\marketing\forms\prebuilt {
    require_once(dirname(__FILE__) . "/../types/Input.php");
    use nobilis\marketing\forms\types\Input;

    class FirstName extends Input {
        private static $config = [
            "type" => "text",
            "name" => "first_name",
            "placeholder" => "First Name"
        ];

        function __construct() {
            parent::__construct(self::$config);
        }
    }
}