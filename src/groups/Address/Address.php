<?php

namespace pgform\groups {
    require_once(dirname(__FILE__) . "/../../base/ItemGroup.php");
    use pgform\ItemGroup;
    use pgform\fields\Country;
    use pgform\fields\State;
    use pgform\elements\Input;
    use pgform\fields\PostalCode;

    /**
     * AddressGroup
     * @package pgform\groups
     */
    class Address extends ItemGroup {

        /**
         * AddressGroup constructor.
         * @param array|null $config
         */
        function __construct(array $config = []) {
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
