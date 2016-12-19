<?php

namespace pgform\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Input.php");
    use pgform\types\Input;

    /**
     * Class Submit
     * @package pgform\prebuilt\fields
     */
    class Submit extends Input {

        /**
         * Default Configuration
         * @var array
         */
        protected $configuration = [
            "attributes" => [
                "type" => "submit",
                "value" => "Submit",
                "class" => "submit"
            ]
        ];

        /**
         * Submit constructor.
         * @param array|null $config
         */
        function __construct(array $config = null) {
            if (!isset($config)) $config = [];
            $this->configuration = array_replace_recursive($this->configuration, $config);
            parent::__construct($this->configuration);
        }
    }
}