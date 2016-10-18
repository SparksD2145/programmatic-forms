<?php

namespace nobilis\marketing\forms\types {

    require_once(dirname(__FILE__) . "/../base/FormItem.php");
    use \nobilis\marketing\forms\base\FormItem;

    class Select extends FormItem  {
        public $configuration = array(
            "autofocus" => false,
            "disabled" => false,
            "form" => null,
            "options" => null,
            "multiple" => false,
            "required" => false,
            "selected" => null,
            "size" => null
        );

        private static $render_ignore_keys = ["options"];


        function __construct (array $config) {
            parent::__construct($config);

            if (isset($config) && !empty($config)) {
                $this->configuration = array_merge($this->configuration, $config);
            }
        }

        public function render() {
            // Open select tag
            $builder = "<select ";

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