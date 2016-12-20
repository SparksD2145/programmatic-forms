<?php

namespace pgform\elements {
    use pgform\FormItem;

    class TextArea extends FormItem  {

        /**
         * @var array
         */
        public $configuration = [
            "attributes" => [
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
            ]
        ];

        /**
         * TextArea constructor.
         * @param array|null $config
         */
        function __construct (array $config = []) {
            $this->configuration = array_replace_recursive($this->configuration, $config);
            parent::__construct($this->configuration);
        }

        /**
         * @return string
         */
        public function render() {
            return $this->render_element_tag("textarea", false, false, true);
        }
    }
}
