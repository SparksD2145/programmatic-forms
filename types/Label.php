<?php

namespace pgforms\types {
    use pgforms\FormItem;

    class Label extends FormItem  {
        public $configuration = array(
            "text" => null
        );

        private static $render_ignore_keys = ["text"];

        function __construct (array $config = null) {
            parent::__construct($config);

            if (isset($config) && !empty($config)) {
                $this->configuration = array_merge($this->configuration, $config);
            }
        }

        public function render() {
            // Open tag
            $builder = "<label ";

            // Clone config to remove items from the list.
            $config = array_merge([], $this->configuration);
            foreach (self::$render_ignore_keys as $key) {
                if (isset($config[$key])) unset($config[$key]);
            }

            // Add configured attributes
            foreach ($config as $key => $value) {
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
