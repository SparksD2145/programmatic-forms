<?php

namespace pgform\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Input.php");
    use pgform\types\Input;

    class Submit extends Input {
        private $configuration = [
            "attributes" => [
                "type" => "submit",
                "value" => "Submit",
                "class" => "submit"
            ]
        ];

        function __construct(array $config = null) {
            if (!isset($config)) $config = [];
            $this->configuration = array_replace_recursive($this->configuration, $config);
            parent::__construct($this->configuration);
        }
    }
}