<?php

namespace pgform\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Input.php");
    use pgform\types\Input;

    /**
     * Class Reset
     * @package pgform\prebuilt\fields
     */
    class Reset extends Input {

        /**
         * Default Configuration
         * @var array
         */
        protected $configuration = [
            "attributes" => [
                "type" => "reset",
                "value" => "Cancel",
                "class" => "reset"
            ]
        ];

        /**
         * Reset constructor.
         * @param null $config
         */
        function __construct($config = null) {
            if (!isset($config)) $config = [];
            $this->configuration = array_merge($this->configuration, $config);
            parent::__construct($this->configuration);
        }
    }
}