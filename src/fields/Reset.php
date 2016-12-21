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
        public static $defaults = [
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
            parent::__construct($config, self::$defaults);
        }
    }
}
