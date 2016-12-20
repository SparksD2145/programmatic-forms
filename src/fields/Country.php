<?php

namespace pgform\fields {
    use pgform\elements\Select;
    use pgform\elements\Option;

    /**
     * Country Field
     * @package pgform\fields
     */
    class Country extends Select {
        /**
         * Default configuration for the Country field.
         * @var array
         */
        public $configuration = [
            "attributes" => [
                "name" => "country",
                "placeholder" => "Country",
                "required" => true,
                "class" => "country",
                "autocomplete" => "country"
            ],
            "items" => []
        ];

        /**
         * Country constructor.
         */
        function __construct() {
            $countries = file_get_contents(dirname(__FILE__) . "/../models/countries.json");
            $countries = json_decode($countries, true);

            foreach ($countries as $name => $value) {
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
