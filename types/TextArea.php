<?php

namespace pgforms\types {
    use pgforms\FormItem;

    class TextArea extends FormItem  {
        public $configuration = array(
            "autocomplete" => false,
            "autofocus" => false,
            "cols" => null,
            "disabled" => false,
            "form" => null,
            "maxlength" => null,
            "minlength" => null,
            "readonly" => false,
            "required" => false,
            "rows" => null,
            "spellcheck" => null,
            "wrap" => null
        );

        private static $render_ignore_keys = [];

        function __construct (array $config = null) {
            parent::__construct($config);

            if (isset($config) && !empty($config)) {
                $this->configuration = array_merge($this->configuration, $config);
            }
        }

        public function render() {
            // Open tag
            $builder = "<textarea ";

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

            // Close tag
            $builder .= "</textarea>";

            // Render
            return $builder;
        }
    }
}
