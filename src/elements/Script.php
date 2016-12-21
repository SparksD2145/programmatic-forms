<?php

namespace pgform\elements {
    use pgform\FormItem;

    /**
     * Script Element
     * @package pgform\elements
     */
    class Script extends FormItem {

        /**
         * Default Configuration
         * @var array
         */
        public static $defaults = [
            "attributes" => [
                "async" => false,
                "defer" => false,
                "src" => null,
                "type" => "text/javascript"
            ]
        ];

        /**
         * Script constructor.
         * @param array|null $config
         */
        function __construct (array $config = []) {
            parent::__construct($config, self::$defaults);
        }

        /**
         * @return string
         */
        public function render() {
            return $this->render_element_tag("script", false);
        }
    }
}
