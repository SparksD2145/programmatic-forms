<?php

namespace pgform\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Input.php");
    use pgform\types\Input;

    class Email extends Input {
        private $configuration = [
            "attributes" => [
                "type" => "email",
                "name" => "email",
                "placeholder" => "Email",
                "required" => true,
                "class" => "email",
                "autocomplete" => "email",
                "inputmode" => "email"
            ]
        ];

        function __construct($config = null) {
            if (!isset($config)) $config = [];
            $this->configuration = array_merge($this->configuration, $config);
            parent::__construct($this->configuration);
        }
    }
}