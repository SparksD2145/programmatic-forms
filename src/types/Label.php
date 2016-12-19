<?php

namespace pgform\types {
    use pgform\FormItem;

    /**
     * Label Element
     * @package pgform\types
     */
    class Label extends FormItem  {
        /**
         * Default Configuration
         * @var array
         */
        protected $configuration = [
            "text" => null,
            "attributes" => []
        ];

        /**
         * Label constructor.
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
            $builder = "<label ";

            // Add configured attributes
            foreach ($this->configuration['attributes'] as $key => $value) {
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
