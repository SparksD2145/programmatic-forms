<?php

namespace pgform\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Input.php");
    use pgform\types\Input;

    /**
     * Class Phone
     * @package pgform\prebuilt\fields
     */
    class Phone extends Input {

        /**
         * Default configuration
         * @var array
         */
        protected $configuration = [
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

        /**
         * Phone constructor.
         * @param null $config
         */
        function __construct($config = null) {
            if (!isset($config)) $config = [];
            $this->configuration = array_merge($this->configuration, $config);
            parent::__construct($this->configuration);
        }
    }
}