<?php

namespace pgform\fields {
    use pgform\elements\Input;

    /**
     * Class Phone
     * @package pgform\fields
     */
    class Phone extends Input {

        /**
         * Default configuration
         * @var array
         */
        public $configuration = [
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
         * @param array|null $config
         */
        function __construct(array $config = []) {
            $this->configuration = array_replace_recursive($this->configuration, $config);
            parent::__construct($this->configuration);
        }
    }
}
