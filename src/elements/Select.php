<?php

namespace pgform\elements {
    use pgform\FormItem;

    /**
     * Select element
     * @package pgform\elements
     */
    class Select extends FormItem  {

        /**
         * @var array
         */
        public static $defaults = [
            "attributes" => [
                "autofocus" => false,
                "disabled" => false,
                "form" => null,
                "multiple" => false,
                "required" => false,
                "selected" => null,
                "size" => null
            ],
            "items" => null
        ];

        /**
         * Select constructor.
         * @param array|null $config
         */
        function __construct (array $config = [], $default_config = []) {
            $this->extend_config($default_config);
            parent::__construct($config);
        }

        /**
         * @return string
         */
        public function render() {
            return $this->render_element_tag("select", false, true);
        }
    }
}
