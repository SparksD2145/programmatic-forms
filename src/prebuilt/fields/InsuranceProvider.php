<?php

namespace pgform\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Select.php");
    require_once(dirname(__FILE__) . "/../../types/Option.php");

    use pgform\types\Select;
    use pgform\types\Option;

    /**
     * Insurance Provider field
     * @package pgform\prebuilt\fields
     */
    class InsuranceProvider extends Select {

        /**
         * Default configuration for the provider field.
         * @var array
         */
        protected $configuration = [
            "attributes" => [
                "name" => "insurance_provider",
                "placeholder" => "Insurance Provider",
                "required" => true,
                "class" => "insurance-provider"
            ],
            "options" => []
        ];

        /**
         * InsuranceProvider constructor.
         */
        function __construct() {
            $providers = file_get_contents(dirname(__FILE__) . "/../../models/insurance_providers.json");
            $providers = json_decode($providers, true);

            foreach ($providers as $name => $value) {
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