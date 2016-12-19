<?php

namespace pgform\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Input.php");
    use pgform\types\Input;

    /**
     * Email field
     * @package pgform\prebuilt\fields
     */
    class Email extends Input {

        /**
         * Default configuration for the field.
         * @var array
         */
        protected $configuration = [
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

        /**
         * Email constructor.
         * @param null $config
         */
        function __construct($config = null) {
            if (!isset($config)) $config = [];
            $this->configuration = array_merge($this->configuration, $config);
            parent::__construct($this->configuration);
        }
    }
}