<?php

namespace pgform\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Select.php");
    require_once(dirname(__FILE__) . "/../../types/Option.php");

    use pgform\types\Select;
    use pgform\types\Option;

    class InsuranceStateBCBS extends Select {
        private $config = [
            "attributes" => [
                "name" => "insurance_state_bcbs",
                "placeholder" => "Insurance State",
                "class" => "insurance-state"
            ],
            "options" => []
        ];

        function __construct() {
            $providers = file_get_contents(dirname(__FILE__) . "/../../models/bcbs_states.json");
            $providers = json_decode($providers, true);

            foreach ($providers as $name => $value) {
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