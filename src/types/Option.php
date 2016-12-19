<?php

namespace pgform\types {
    use pgform\FormItem;

    /**
     * Option Element
     * @package pgform\types
     */
    class Option extends FormItem  {

        /**
         * Default Configuration
         * @var array
         */
        protected $configuration = [
            "attributes" => [
                "disabled" => false,
                "label" => null,
                "selected" => null,
                "name" => null,
                "value" => null
            ],
            "text" => null
        ];

        /**
         * Option constructor.
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
            // Open option tag
            $builder = "<option ";

            // Add configured attributes
            foreach ($this->configuration['attributes'] as $key => $value) {
                if (isset($value) && !empty($value)) {
                    $builder .= "$key='$value' ";
                }

                if ($key == 'value' && $value == null) {
                    $builder .= "$key='' ";
                }
            }

            // If no text is provided, use the name of the option
            if (!isset($this->configuration['text'])) $this->configuration['text'] = $this->configuration['attributes']['name'];

            // Close option tag
            $builder .= ">" . $this->configuration['text'] . "</option>";

            // Render
            return $builder;
        }
    }
}
