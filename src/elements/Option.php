<?php

namespace pgform\elements {
    use pgform\FormItem;

    /**
     * Option Element
     * @package pgform\elements
     */
    class Option extends FormItem  {

        /**
         * Default Configuration
         * @var array
         */
        public $configuration = [
            "attributes" => [
                "disabled" => false,
                "label" => null,
                "selected" => null,
                "name" => null,
                "value" => null
            ],
            "text" => null
        ];

        /**
         * Option constructor.
         * @param array|null $config
         */
        function __construct (array $config = []) {
            $this->configuration = array_replace_recursive($this->configuration, $config);

            // If no text is provided, use the name of the option
            if (!isset($this->configuration['text'])) {
                $this->change_config(["text" => $this->configuration["attributes"]["name"]]);
            }

            parent::__construct($this->configuration);
        }

        /**
         * @return string
         */
        public function render() {
            return $this->render_element_tag("option", false, false, true);
        }
    }
}
