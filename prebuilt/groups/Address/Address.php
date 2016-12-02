<?php

namespace pgforms\prebuilt\groups {
    use pgforms\ItemGroup;
    use pgforms\prebuilt\fields\Country;
    use pgforms\prebuilt\fields\State;
    use pgforms\types\Input;
    use pgforms\prebuilt\fields\PostalCode;

    class Address extends ItemGroup {
        function __construct($config = null) {
            $items = [
                new Input([
                    "attributes" => [
                        "name" => "Address",
                        "class"=> "address",
                        "required" => "true",
                        "type" => "text",
                        "placeholder" => "Address"
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
                        "required" => "true"
                    ]
                ])

            ];

            parent::__construct($items, $config);
        }
    }
}
