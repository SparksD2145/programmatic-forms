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
        public static $defaults = [
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
            parent::__construct($config, self::$defaults);
        }
    }
}
