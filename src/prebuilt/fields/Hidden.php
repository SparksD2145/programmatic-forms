<?php

namespace pgform\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Input.php");
    use pgform\types\Input;

    /**
     * Hidden field
     * @package pgform\prebuilt\fields
     */
    class Hidden extends Input {

        /**
         * Default configuration for the field.
         * @var array
         */
        protected $configuration = [
            "attributes" => [
                "type" => "hidden"
            ]
        ];

        /**
         * Hidden field constructor.
         * @param null $config
         */
        function __construct($config = null) {
            if (!isset($config)) $config = [];
            $this->configuration = array_replace_recursive($this->configuration, $config);
            parent::__construct($this->configuration);
        }
    }
}