<?php

namespace nobilis\marketing\forms\prebuilt {
    require(dirname(__FILE__) . "/../types/Input.php");
    use nobilis\marketing\forms\types\Input;

    class FirstName extends Input {
        private static $config = array(
            "type" => "text",
            "name" => "first_name",
            "placeholder" => "First Name"
        );

        function __construct() {
            parent::__construct(self::$config);
        }
    }
}