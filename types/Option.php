<?php

namespace nobilis\marketing\forms\types {

    require_once(dirname(__FILE__) . "/../base/FormItem.php");
    use \nobilis\marketing\forms\base\FormItem;

    class Option extends FormItem  {
        public $configuration = array(
            "disabled" => false,
            "label" => null,
            "selected" => null,
            "name" => null,
            "value" => null,
            "text" => null
        );


        function __construct (array $config) {
            parent::__construct($config);

            if (isset($config) && !empty($config)) {
                $this->configuration = array_merge($this->configuration, $config);
            }
        }

        public function render() {
            // Open option tag
            $builder = "<option ";

            // Add configured attributes
            foreach ($this->configuration as $key => $value) {
                if (isset($value) && !empty($value)) {
                    $builder .= "$key='$value' ";
                }
            }

            // If no text is provided, use the name of the option
            if (!isset($this->configuration['text'])) $this->configuration['text'] = $this->configuration['name'];

            // Close option tag
            $builder .= ">" . $this->configuration['text'] . "</option>";

            // Render
            return $builder;
        }
    }
}