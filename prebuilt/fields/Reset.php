<?php

namespace pgform\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Input.php");
    use pgform\types\Input;

    class Reset extends Input {
        private $configuration = [
            "attributes" => [
                "type" => "reset",
                "value" => "Cancel",
                "class" => "reset"
            ]
        ];

        function __construct($config = null) {
            if (!isset($config)) $config = [];
            $this->configuration = array_merge($this->configuration, $config);
            parent::__construct($this->configuration);
        }
    }
}