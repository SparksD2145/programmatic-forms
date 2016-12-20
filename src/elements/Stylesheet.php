<?php

namespace pgform\elements {
    use pgform\FormItem;

    class Stylesheet extends FormItem  {

        /**
         * @var array
         */
        public $configuration = [
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
            $this->configuration = array_replace_recursive($this->configuration, $config);
            parent::__construct($this->configuration);
        }

        /**
         * @return string
         */
        public function render() {
            return $this->render_element_tag("link");
        }
    }
}
