<?php

namespace pgform\types {
    use pgform\FormItem;

    class TextArea extends FormItem  {

        /**
         * @var array
         */
        protected $configuration = [
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
        function __construct (array $config = null) {
            if (isset($config) && !empty($config)) {
                $this->configuration = array_replace_recursive($this->configuration, $config);
            }

            parent::__construct($this->configuration);
        }

        /**
         * @return string
         */
        public function render() {
            // Open tag
            $builder = "<textarea ";

            // Add configured attributes
            foreach ($this->configuration['attributes'] as $key => $value) {
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
