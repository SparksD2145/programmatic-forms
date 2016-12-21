<?php

namespace pgform\fields {
    use pgform\ItemGroup;
    use pgform\elements\Input;
    use pgform\elements\Script;

    /**
     * Postal Code field
     * @package pgform\fields
     */
    class PostalCode extends ItemGroup {

        /**
         * The default configuration for the Postal Code field.
         * @var array
         */
        public static $defaults = [
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
        function __construct(array $config = []) {
            parent::__construct($config, self::$defaults);

            $this->configuration["items"] = [
                new Input($this->configuration),
                new Script([
                    "attributes" => [
                        "src" => $this->relative_dir_url(__FILE__) . 'PostalCode.js'
                    ]
                ])
            ];
        }
    }
}
