<?php

namespace pgform\types {
    use pgform\FormItem;

    class Script extends FormItem {
        public $configuration = [
            "attributes" => [
                "async" => false,
                "defer" => false,
                "src" => null,
                "type" => "text/javascript"
            ]
        ];

        function __construct (array $config = null) {
            if (isset($config) && !empty($config)) {
                $this->configuration = array_replace_recursive($this->configuration, $config);
            }

            parent::__construct($this->configuration);
        }

        public function render() {
            // Open script tag
            $builder = "<script ";

            // Add configured attributes
            foreach ($this->configuration['attributes'] as $key => $value) {
                if (isset($value) && !empty($value)) {

                    // SRC Fix
                    if ($key == 'src') {
                        $value = $this->relative_url($value);
                    }

                    $builder .= "$key='$value' ";
                }
            }

            // Close script tag
            $builder .= "></script>";

            // Render
            return $builder;
        }
    }
}
