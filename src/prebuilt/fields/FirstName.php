<?php

namespace pgform\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Input.php");
    use pgform\types\Input;

    /**
     * FirstName field
     * @package pgform\prebuilt\fields
     */
    class FirstName extends Input {

        /**
         * Default configuration for the field.
         * @var array
         */
        protected $config = [
            "attributes" => [
                "type" => "text",
                "name" => "first_name",
                "placeholder" => "First Name",
                "required" => true,
                "class" => "first-name",
                "autocomplete" => "given-name"
            ]
        ];

        /**
         * FirstName constructor.
         * @param null $config
         */
        function __construct($config = null) {
            if (!isset($config)) $config = [];
            $this->config = array_replace_recursive($this->config, $config);
            parent::__construct($this->config);
        }
    }
}