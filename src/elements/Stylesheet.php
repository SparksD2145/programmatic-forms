<?php

namespace pgform\elements {
    use pgform\FormItem;

    class Stylesheet extends FormItem  {

        /**
         * @var array
         */
        public static $defaults = [
            "attributes" => [
                "href" => null,
                "media" => null,
                "sizes" => null,
                "rel" => 'stylesheet',
                "property" => 'stylesheet'
            ]
        ];

        /**
         * Stylesheet constructor.
         * @param array|null $config optional configuration
         */
        function __construct (array $config = []) {
            parent::__construct($config, self::$defaults);
        }

        /**
         * @return string
         */
        public function render() {
            return $this->render_element_tag("link");
        }
    }
}
