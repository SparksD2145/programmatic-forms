<?php

namespace pgform\types {
    use pgform\FormItem;

    /**
     * Script Element
     * @package pgform\types
     */
    class Script extends FormItem {

        /**
         * Default Configuration
         * @var array
         */
        protected $configuration = [
            "attributes" => [
                "async" => false,
                "defer" => false,
                "src" => null,
                "type" => "text/javascript"
            ]
        ];

        /**
         * Script constructor.
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
            // Open script tag
            $builder = "<script ";

            // Add configured attributes
            foreach ($this->configuration['attributes'] as $key => $value) {
                if (isset($value) && !empty($value)) {

                    // SRC Fix
                    if ($key == 'src') {
                        $value = $this->relative_url($value);
                    }

                    $builder .= "$key='$value' ";
                }
            }

            // Close script tag
            $builder .= "></script>";

            // Render
            return $builder;
        }
    }
}
