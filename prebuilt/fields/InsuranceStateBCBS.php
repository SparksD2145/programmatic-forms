<?php

namespace pgforms\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Select.php");
    require_once(dirname(__FILE__) . "/../../types/Option.php");

    use pgforms\types\Select;
    use pgforms\types\Option;

    class InsuranceStateBCBS extends Select {
        private $config = [
            "name" => "insurance_state_bcbs",
            "placeholder" => "Insurance State",
            "options" => []
        ];

        function __construct() {
            $providers = file_get_contents(dirname(__FILE__) . "/../../models/bcbs_states.json");
            $providers = json_decode($providers, true);

            foreach ($providers as $name => $value) {
                array_push($this->config['options'], new Option([
                    "name" => $name,
                    "value" => $value
                ]));
            }

            parent::__construct($this->config);
        }
    }
}