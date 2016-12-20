<?php

namespace pgform\fields {
    use pgform\elements\Input;

    /**
     * Class Submit
     * @package pgform\elements
     */
    class Submit extends Input {

        /**
         * Default Configuration
         * @var array
         */
        public $configuration = [
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
        function __construct(array $config = []) {
            $this->configuration = array_replace_recursive($this->configuration, $config);
            parent::__construct($this->configuration);
        }
    }
}
