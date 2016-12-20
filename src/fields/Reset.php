<?php

namespace pgform\fields {
    use pgform\elements\Input;

    /**
     * Class Reset
     * @package pgform\elements
     */
    class Reset extends Input {

        /**
         * Default Configuration
         * @var array
         */
        public $configuration = [
            "attributes" => [
                "type" => "reset",
                "value" => "Cancel",
                "class" => "reset"
            ]
        ];

        /**
         * Reset constructor.
         * @param array|null $config
         */
        function __construct(array $config = []) {
            $this->configuration = array_replace_recursive($this->configuration, $config);
            parent::__construct($this->configuration);
        }
    }
}
