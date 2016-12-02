<?php

namespace pgforms\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Select.php");
    require_once(dirname(__FILE__) . "/../../types/Option.php");

    use pgforms\types\Select;
    use pgforms\types\Option;

    class State extends Select {
        private $config = [
            "attributes" => [
                "name" => "state",
                "placeholder" => "State",
                "required" => true,
                "class" => "state"
            ],
            "options" => []
        ];

        function __construct() {
            $states = file_get_contents(dirname(__FILE__) . "/../../models/states.json");
            $states = json_decode($states, true);

            foreach ($states as $name => $value) {
                array_push($this->config['options'], new Option([
                    "attributes" => [
                        "name" => $name,
                        "value" => $value
                    ]
                ]));
            }

            parent::__construct($this->config);
        }
    }
}