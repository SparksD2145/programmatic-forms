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
        public static $defaults = [
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
         * @param array $config Configuration
         */
        function __construct(array $config = []) {
            parent::__construct($config, self::$defaults);

            $countries = file_get_contents($this->relative_file_path("models/countries.json"));
            $countries = json_decode($countries, true);

            foreach ($countries as $name => $value) {
                array_push($this->configuration['items'], new Option([
                    "attributes" => [
                        "name" => $name,
                        "value" => $value
                    ]
                ]));
            }
        }
    }
}
