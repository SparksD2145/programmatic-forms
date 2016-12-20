<?php

namespace pgform\elements {
    require_once(dirname(__FILE__) . "/../elements/Input.php");
    use pgform\elements\Input;

    /**
     * Hidden field
     * @package pgform\elements
     */
    class Hidden extends Input {

        /**
         * Default configuration for the field.
         * @var array
         */
        public $configuration = [
            "attributes" => [
                "type" => "hidden"
            ]
        ];

        /**
         * Hidden field constructor.
         * @param array|null $config
         */
        function __construct(array $config = []) {
            $this->configuration = array_replace_recursive($this->configuration, $config);
            parent::__construct($this->configuration);
        }
    }
}
