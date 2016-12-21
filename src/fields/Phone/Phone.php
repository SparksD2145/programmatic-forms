<?php

namespace pgform\fields {
    use pgform\ItemGroup;
    use pgform\elements\Input;
    use pgform\elements\Script;

    /**
     * Postal Code field
     * @package pgform\fields
     */
    class Phone extends ItemGroup {

        /**
         * Default configuration
         * @var array
         */
        public static $defaults = [
            "attributes" => [
                "type" => "tel",
                "name" => "phone",
                "placeholder" => "Phone Number",
                "required" => true,
                "class" => "phone",
                "autocomplete" => "tel",
                "inputmode" => "tel"
            ]
        ];

        /**
         * Phone constructor.
         * @param array $config
         */
        function __construct(array $config = []) {
            parent::__construct($config, self::$defaults);

            $this->configuration["items"] = [
                new Input($this->configuration),
                new Script([
                    "attributes" => [
                        "src" => $this->relative_dir_url(__FILE__) . 'Phone.js'
                    ]
                ])
            ];
        }
    }
}

