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
        public $configuration = [
            "text" => null,
            "attributes" => []
        ];

        /**
         * Label constructor.
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
            return $this->render_element_tag("label", false, false, true);
        }
    }
}
