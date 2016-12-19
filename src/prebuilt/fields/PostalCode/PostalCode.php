<?php

namespace pgform\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../../types/Input.php");
    use pgform\types\Input;
    use pgform\ItemGroup;
    use pgform\types\Script;

    /**
     * Postal Code field
     * @package pgform\prebuilt\fields
     */
    class PostalCode extends ItemGroup {
        /**
         * The directory in which this file lives.
         * @var string
         */
        private $directory = 'prebuilt/fields/PostalCode/';

        /**
         * The default configuration for the Postal Code field.
         * @var array
         */
        protected $configuration = [
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

        /**
         * PostalCode constructor.
         * @param array $config
         */
        function __construct(array $config = null) {
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