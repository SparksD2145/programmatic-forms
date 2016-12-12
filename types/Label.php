<?php

namespace pgform\types {
    use pgform\FormItem;

    class Label extends FormItem  {
        public $configuration = [
            "text" => null,
            "attributes" => []
        ];

        function __construct (array $config = null) {
            if (isset($config) && !empty($config)) {
                $this->configuration = array_replace_recursive($this->configuration, $config);
            }

            parent::__construct($this->configuration);
        }

        public function render() {
            // Open tag
            $builder = "<label ";

            // Add configured attributes
            foreach ($this->configuration['attributes'] as $key => $value) {
                if (isset($value) && !empty($value)) {
                    $builder .= "$key='$value' ";
                }
            }

            // Close opening tag
            $builder .= " />";

            // Add text
            $builder .= $this->configuration["text"];

            // Close tag
            $builder .= "</label>";

            // Render
            return $builder;
        }
    }
}
