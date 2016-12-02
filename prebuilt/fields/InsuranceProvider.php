<?php

namespace pgforms\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Select.php");
    require_once(dirname(__FILE__) . "/../../types/Option.php");

    use pgforms\types\Select;
    use pgforms\types\Option;

    class InsuranceProvider extends Select {
        private $config = [
            "attributes" => [
                "name" => "insurance_provider",
                "placeholder" => "Insurance Provider",
                "required" => true,
                "class" => "insurance-provider"
            ],
            "options" => []
        ];

        function __construct() {
            $providers = file_get_contents(dirname(__FILE__) . "/../../models/insurance_providers.json");
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