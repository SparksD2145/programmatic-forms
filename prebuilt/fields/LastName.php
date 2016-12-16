<?php

namespace pgform\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Input.php");
    use pgform\types\Input;

    class LastName extends Input {
        private $configuration = [
            "attributes" => [
                "type" => "text",
                "name" => "last_name",
                "placeholder" => "Last Name",
                "required" => true,
                "class" => "last-name",
                "autocomplete" => "family-name"
            ]
        ];

        function __construct($config = null) {
            if (!isset($config)) $config = [];
            $this->configuration = array_replace_recursive($this->configuration, $config);
            parent::__construct($this->configuration);
        }
    }
}