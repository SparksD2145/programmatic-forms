<?php

namespace pgform\types {
    use pgform\FormItem;

    /**
     * Input Element
     * @package pgform\types
     */
    class Input extends FormItem  {
        protected $configuration = array(
            "attributes" => [
                "type" => "text",
                "accept" => null,
                "autocapitalize" => false,
                "autocomplete" => null,
                "autofocus" => false,
                "capture" => null,
                "checked" => false,
                "disabled" => false,
                "form" => null,
                "height" => null,
                "incremental" => null,
                "inputmode" => null,
                "list" => null,
                "min" => null,
                "max" => null,
                "minlength" => null,
                "maxlength" => null,
                "multiple" => false,
                "pattern" => null,
                "readonly" => false,
                "required" => false,
                "results" => null,
                "size" => null,
                "spellcheck" => null,
                "src" => null,
                "step" => null,
                "tabindex" => null,
                "value" => null,
                "width" => null
            ]
        );

        /**
         * Input constructor.
         * @param array|null $config
         */
        function __construct (array $config = null) {
            if (isset($config) && !empty($config)) {
                $this->configuration = array_replace_recursive($this->configuration, $config);
            }

            parent::__construct($this->configuration);
        }

        /**
         * Render an Input
         * @return string
         */
        public function render() {
            // Open input tag
            $builder = "<input ";

            // Enter each configured value as an attribute.
            foreach ($this->configuration['attributes'] as $key => $value) {
                if (isset($value) && !empty($value)) {
                    $builder .= "$key='$value' ";
                }
            }

            // Close tag
            $builder .= " />";

            // Render
            return $builder;
        }
    }
}
