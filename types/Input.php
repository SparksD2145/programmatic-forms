<?php

namespace nobilis\forms\types {

    require_once(dirname(__FILE__) . "/../base/FormItem.php");
    use \nobilis\forms\base\FormItem;

    class Input extends FormItem  {
        public $configuration = array(
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
        );


        function __construct (array $config) {
            parent::__construct($config);

            if (isset($config) && !empty($config)) {
                $this->configuration = array_merge($this->configuration, $config);
            }
        }

        public function render() {
            // Open input tag
            $builder = "<input ";

            // Enter each configured value as an attribute.
            foreach ($this->configuration as $key => $value) {
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