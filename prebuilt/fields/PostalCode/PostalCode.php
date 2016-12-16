<?php

namespace pgform\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../../types/Input.php");
    use pgform\types\Input;
    use pgform\ItemGroup;
    use pgform\types\Script;

    /**
     * Class PostalCode
     * @package pgform\prebuilt\fields
     */
    class PostalCode extends ItemGroup {
        private $directory = 'prebuilt/fields/PostalCode/';

        private $configuration = [
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
            $this->configuration = array_replace_recursive($this->configuration, $config);

            $items = [
                new Input($this->configuration),
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