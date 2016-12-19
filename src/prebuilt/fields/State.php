<?php

namespace pgform\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Select.php");
    require_once(dirname(__FILE__) . "/../../types/Option.php");

    use pgform\types\Select;
    use pgform\types\Option;

    /**
     * Class State
     * @package pgform\prebuilt\fields
     */
    class State extends Select {

        /**
         * Default configuration
         * @var array
         */
        protected $configuration = [
            "attributes" => [
                "name" => "state",
                "placeholder" => "State",
                "required" => true,
                "class" => "state"
            ],
            "options" => []
        ];

        /**
         * State constructor.
         */
        function __construct() {
            $states = file_get_contents(dirname(__FILE__) . "/../../models/states.json");
            $states = json_decode($states, true);

            foreach ($states as $name => $value) {
                array_push($this->configuration['options'], new Option([
                    "attributes" => [
                        "name" => $name,
                        "value" => $value
                    ]
                ]));
            }

            parent::__construct($this->configuration);
        }
    }
}