<?php

namespace pgform\fields {
    use pgform\elements\Input;

    /**
     * FirstName field
     * @package pgform\fields
     */
    class FirstName extends Input {

        /**
         * Default configuration for the field.
         * @var array
         */
        public $configuration = [
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
         * @param array|null $config
         */
        function __construct(array $config = []) {
            $this->configuration = array_replace_recursive($this->configuration, $config);
            parent::__construct($this->configuration);
        }
    }
}
