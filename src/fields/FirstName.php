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
        public static $defaults = [
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
            parent::__construct($config, self::$defaults);
        }
    }
}
