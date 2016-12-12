<?php

namespace pgform\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Select.php");
    require_once(dirname(__FILE__) . "/../../types/Option.php");

    use pgform\types\Select;
    use pgform\types\Option;

    class Country extends Select {
        private $config = [
            "attributes" => [
                "name" => "country",
                "placeholder" => "Country",
                "required" => true,
                "class" => "country",
                "autocomplete" => "country"
            ],
            "options" => []
        ];

        function __construct() {
            $countries = file_get_contents(dirname(__FILE__) . "/../../models/countries.json");
            $countries = json_decode($countries, true);

            foreach ($countries as $name => $value) {
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