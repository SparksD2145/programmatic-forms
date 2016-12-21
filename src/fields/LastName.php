<?php

namespace pgform\fields {
    use pgform\elements\Input;

    /**
     * LastName field
     * @package pgform\fields
     */
    class LastName extends Input {

        /**
         * Default configuration
         * @var array
         */
        public static $defaults = [
            "attributes" => [
                "type" => "text",
                "name" => "last_name",
                "placeholder" => "Last Name",
                "required" => true,
                "class" => "last-name",
                "autocomplete" => "family-name"
            ]
        ];

        /**
         * LastName constructor.
         * @param array|null $config
         */
        function __construct(array $config = []) {
            parent::__construct($config, self::$defaults);
        }
    }
}
