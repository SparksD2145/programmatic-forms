<?php

namespace pgform\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../../types/Input.php");
    use pgform\types\Input;
    use pgform\ItemGroup;
    use pgform\types\Script;

    class PostalCode extends ItemGroup {
        private $directory = 'prebuilt/fields/PostalCode/';

        private static $config = [
            "attributes" => [
                "type" => "text",
                "name" => "PostalCode",
                "placeholder" => "Zip / Postal Code",
                "class" => "postalcode",
                "maxlength" => 5,
                "autocomplete" => "postal-code",
                "inputmode" => "numeric",
                "pattern" => "[0-9]{4,5}"
            ]
        ];

        function __construct($config = null) {
            if (!isset($config)) $config = [];
            $config = array_replace_recursive(self::$config, $config);

            $items = [
                new Input($config),
                new Script([
                    "attributes" => [
                        "src" => $this->directory . 'PostalCode.js'
                    ]
                ])
            ];

            parent::__construct($items, $config);
        }
    }
}