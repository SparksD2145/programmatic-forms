<?php

namespace pgform\fields {
    use pgform\elements\Input;

    /**
     * Email field
     * @package pgform\fields
     */
    class Email extends Input {

        /**
         * Default configuration for the field.
         * @var array
         */
        public $configuration = [
            "attributes" => [
                "type" => "email",
                "name" => "email",
                "placeholder" => "Email",
                "required" => true,
                "class" => "email",
                "autocomplete" => "email",
                "inputmode" => "email"
            ]
        ];

        /**
         * Email constructor.
         * @param array|null $config
         */
        function __construct(array $config = []) {
            $this->configuration = array_replace_recursive($this->configuration, $config);
            parent::__construct($this->configuration);
        }
    }
}
