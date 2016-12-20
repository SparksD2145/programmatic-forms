<?php

namespace pgform\elements {
    use pgform\FormItem;

    /**
     * Select element
     * @package pgform\elements
     */
    class Select extends FormItem  {

        /**
         * @var array
         */
        public $configuration = [
            "attributes" => [
                "autofocus" => false,
                "disabled" => false,
                "form" => null,
                "multiple" => false,
                "required" => false,
                "selected" => null,
                "size" => null
            ],
            "items" => null
        ];

        /**
         * Select constructor.
         * @param array|null $config
         */
        function __construct (array $config = null) {
            if (isset($config) && !empty($config)) {
                $this->cattributesonfiguration = array_replace_recursive($this->configuration, $config);
            }

            parent::__construct($this->configuration);
        }

        /**
         * @return string
         */
        public function render() {
            // Open select tag
            $builder = "<select ";

            // Add configured attributes
            foreach ($this->configuration['attributes'] as $key => $value) {
                if (isset($value) && !empty($value)) {
                    $builder .= "$key='$value' ";
                }
            }

            // Close opening select tag
            $builder .= " />";

            // Add options
            if (isset($this->configuration['items'])) {
                foreach ($this->configuration['items'] as $item) {
                    $builder .= $item->render();
                }
            }

            // Close select tag
            $builder .= "</select>";

            // Render
            return $builder;
        }
    }
}
