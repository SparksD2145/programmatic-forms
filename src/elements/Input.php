<?php

namespace pgform\elements {
    require_once(dirname(__FILE__) . "/../base/FormItem.php");
    use pgform\FormItem;

    /**
     * Input Element
     * @package pgform\elements
     */
    class Input extends FormItem  {
        public $configuration = array(
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
        function __construct (array $config = []) {
            $this->configuration = array_replace_recursive($this->configuration, $config);
            parent::__construct($this->configuration);
        }

        /**
         * Render an Input
         * @return string
         */
        public function render() {
            return $this->render_element_tag("input");
        }
    }
}
