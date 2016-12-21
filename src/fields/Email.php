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
        public static $defaults = [
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
            parent::__construct($config, self::$defaults);
        }
    }
}
