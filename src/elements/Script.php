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
        public $configuration = [
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
            $this->configuration = array_replace_recursive($this->configuration, $config);
            parent::__construct($this->configuration);
        }

        /**
         * @return string
         */
        public function render() {
            return $this->render_element_tag("script", false);
        }
    }
}
