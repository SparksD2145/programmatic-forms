<?php

namespace pgform\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Input.php");
    use pgform\types\Input;

    /**
     * LastName field
     * @package pgform\prebuilt\fields
     */
    class LastName extends Input {

        /**
         * Default configuration
         * @var array
         */
        protected $configuration = [
            "attributes" => [
                "type" => "text",
                "name" => "last_name",
                "placeholder" => "Last Name",
                "required" => true,
                "class" => "last-name",
                "autocomplete" => "family-name"
            ]
        ];

        /**
         * LastName constructor.
         * @param null $config
         */
        function __construct($config = null) {
            if (!isset($config)) $config = [];
            $this->configuration = array_replace_recursive($this->configuration, $config);
            parent::__construct($this->configuration);
        }
    }
}