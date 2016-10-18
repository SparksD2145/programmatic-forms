<?php

namespace nobilis\marketing\forms\prebuilt {
    require_once(dirname(__FILE__) . "/../types/Input.php");
    use nobilis\marketing\forms\types\Input;

    class LastName extends Input {
        private static $config = [
            "type" => "text",
            "name" => "last_name",
            "placeholder" => "Last Name"
        ];

        function __construct() {
            parent::__construct(self::$config);
        }
    }
}