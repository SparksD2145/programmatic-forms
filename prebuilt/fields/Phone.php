<?php

namespace pgform\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Input.php");
    use pgform\types\Input;

    class Phone extends Input {
        private $configuration = [
            "attributes" => [
                "type" => "tel",
                "name" => "phone",
                "placeholder" => "Phone Number",
                "required" => true,
                "class" => "phone",
                "autocomplete" => "tel",
                "inputmode" => "tel"
            ]
        ];

        function __construct($config = null) {
            if (!isset($config)) $config = [];
            $this->configuration = array_merge($this->configuration, $config);
            parent::__construct($this->configuration);
        }
    }
}