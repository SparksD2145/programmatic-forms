<?php

namespace pgform\prebuilt\groups {
    use pgform\ItemGroup;
    use pgform\prebuilt\fields\Country;
    use pgform\prebuilt\fields\State;
    use pgform\types\Input;
    use pgform\prebuilt\fields\PostalCode;

    /**
     * AddressGroup
     * @package pgform\prebuilt\groups
     */
    class AddressGroup extends ItemGroup {

        /**
         * AddressGroup constructor.
         * @param null $config
         */
        function __construct($config = null) {
            $items = [
                new Input([
                    "attributes" => [
                        "name" => "Address",
                        "class"=> "address",
                        "required" => "true",
                        "type" => "text",
                        "placeholder" => "Address",
                        "autocomplete" => "street-address"
                    ]
                ]),
                new Input([
                    "attributes" => [
                        "name" => "City",
                        "class"=> "city",
                        "required" => "true",
                        "type" => "text",
                        "placeholder" => "City"
                    ]
                ]),
                /* Change to select later */
                new State([
                    "attributes" => [
                        "name" => "State",
                        "class"=> "state",
                        "required" => "true"
                    ]
                ]),
                new Country([
                    "attributes" => [
                        "class"=> "country",
                        "required" => "true"
                    ]
                ]),
                new PostalCode([
                    "attributes" => [
                        "class"=> "postalcode",
                        "required" => "true",
                        "maxlength" => "5"
                    ]
                ])

            ];

            parent::__construct($items, $config);
        }
    }
}
