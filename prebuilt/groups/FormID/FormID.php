<?php

namespace pgform\prebuilt\groups {

    use pgform\Form;
    use pgform\ItemGroup;
    use pgform\prebuilt\fields\Hidden;

    class FormIDGroup extends ItemGroup {

        function __construct(Form $callingForm, array $config = null) {

            $form_name = get_class($callingForm);
            if (isset($config) && isset($config['unique-name'])) {
                $form_name .= "|" . $config['unique-name'];
            }

            // Prevent form configuration from messing with our items
            if (isset($config['items'])) {
                unset($config['items']);
            }

            $items = [
                new Hidden([
                    "attributes" => [
                        "name" => "form-name",
                        "value" => $form_name
                    ]
                ]),
                new Hidden([
                    "attributes" => [
                        "name" => "host",
                        "value" => $_SERVER['HTTP_HOST']
                    ]
                ]),
                new Hidden([
                    "attributes" => [
                        "name" => "referrer_uri",
                        "value" => $_SERVER['REQUEST_URI']
                    ]
                ])
            ];

            if (!empty($_SERVER['QUERY_STRING'])) {
                array_push($items, new Hidden([
                    "attributes" => [
                        "name" => "query",
                        "value" => $_SERVER['QUERY_STRING']
                    ]
                ]));
            }

            parent::__construct($items, $config);
        }
    }
}
