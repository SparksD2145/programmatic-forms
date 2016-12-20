<?php

namespace pgform\fields {
    use pgform\elements\Select;
    use pgform\elements\Option;

    /**
     * Class State
     * @package pgform\fields
     */
    class State extends Select {

        /**
         * Default configuration
         * @var array
         */
        public $configuration = [
            "attributes" => [
                "name" => "state",
                "placeholder" => "State",
                "required" => true,
                "class" => "state"
            ],
            "items" => []
        ];

        /**
         * State constructor.
         */
        function __construct() {
            $states = file_get_contents(dirname(__FILE__) . "/../models/states.json");
            $states = json_decode($states, true);

            foreach ($states as $name => $value) {
                array_push($this->configuration['items'], new Option([
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
