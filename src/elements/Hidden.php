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
        public static $defaults = [
            "attributes" => [
                "type" => "hidden"
            ]
        ];

        /**
         * Hidden field constructor.
         * @param array|null $config
         */
        function __construct(array $config = []) {
            parent::__construct($config, self::$defaults);
        }
    }
}
