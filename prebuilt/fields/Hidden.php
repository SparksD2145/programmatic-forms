<?php

namespace pgform\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Input.php");
    use pgform\types\Input;

    class Hidden extends Input {
        private $configuration = [
            "attributes" => [
                "type" => "hidden"
            ]
        ];

        function __construct($config = null) {
            if (!isset($config)) $config = [];
            $this->configuration = array_replace_recursive($this->configuration, $config);
            parent::__construct($this->configuration);
        }
    }
}