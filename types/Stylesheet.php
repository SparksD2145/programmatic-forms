<?php

namespace pgform\types {
    use pgform\FormItem;

    class Stylesheet extends FormItem  {
        private $configuration = [
            "attributes" => [
                "href" => null,
                "media" => null,
                "sizes" => null,
                "rel" => 'stylesheet',
                "property" => 'stylesheet'
            ]
        ];

        function __construct (array $config = null) {
            if (isset($config) && !empty($config)) {
                $this->configuration = array_replace_recursive($this->configuration, $config);
            }

            parent::__construct($this->configuration);
        }

        public function render() {
            // Open link tag
            $builder = "<link ";

            // Add configured attributes
            foreach ($this->configuration['attributes'] as $key => $value) {
                if (isset($value) && !empty($value)) {
                    // HREF Fix
                    if ($key == 'href') {
                        $value = $this->relative_url($value);
                    }


                    $builder .= "$key='$value' ";
                }
            }

            // Close script tag
            $builder .= "/>";

            // Render
            return $builder;
        }
    }
}
