<?php

namespace pgform\elements {
    use pgform\FormItem;

    /**
     * Label Element
     * @package pgform\elements
     */
    class Label extends FormItem  {
        /**
         * Default Configuration
         * @var array
         */
        public static $defaults = [
            "text" => null,
            "attributes" => []
        ];

        /**
         * Label constructor.
         * @param array|null $config
         */
        function __construct (array $config = []) {
            parent::__construct($config, self::$defaults);
        }

        /**
         * @return string
         */
        public function render() {
            return $this->render_element_tag("label", false, false, true);
        }
    }
}
