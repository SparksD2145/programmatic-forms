<?php

namespace pgform\types {
    use pgform\FormItem;

    class Select extends FormItem  {
        public $configuration = [
            "attributes" => [
                "autofocus" => false,
                "disabled" => false,
                "form" => null,
                "multiple" => false,
                "required" => false,
                "selected" => null,
                "size" => null
            ],
            "options" => null
        ];

        function __construct (array $config = null) {
            if (isset($config) && !empty($config)) {
                $this->configuration = array_replace_recursive($this->configuration, $config);
            }

            parent::__construct($this->configuration);
        }

        public function render() {
            // Open select tag
            $builder = "<select ";

            // Add configured attributes
            foreach ($this->configuration['attributes'] as $key => $value) {
                if (isset($value) && !empty($value)) {
                    $builder .= "$key='$value' ";
                }
            }

            // Close opening select tag
            $builder .= " />";

            // Add options
            if (isset($this->configuration['options'])) {
                foreach ($this->configuration['options'] as $option) {
                    $builder .= $option->render();
                }
            }

            // Close select tag
            $builder .= "</select>";

            // Render
            return $builder;
        }
    }
}
