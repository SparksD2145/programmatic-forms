<?php

namespace pgforms\types {
    use pgforms\FormItem;

    class Script extends FormItem {
        public $configuration = array(
            "async" => false,
            "defer" => false,
            "src" => null,
            "type" => 'text/javascript'
        );

        function __construct (array $config = null) {
            parent::__construct($config);

            if (isset($config) && !empty($config)) {
                $this->configuration = array_merge($this->configuration, $config);
            }
        }

        public function render() {
            // Open script tag
            $builder = "<script ";

            // Add configured attributes
            foreach ($this->configuration as $key => $value) {
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
