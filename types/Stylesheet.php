<?php

namespace pgforms\types {
    use pgforms\FormItem;

    class Stylesheet extends FormItem  {
        public $configuration = array(
            "href" => null,
            "media" => null,
            "sizes" => null,
            "rel" => 'stylesheet',
            "property" => 'stylesheet',
            //"type" => 'text/css'
        );

        function __construct (array $config = null) {
            parent::__construct($config);

            if (isset($config) && !empty($config)) {
                $this->configuration = array_merge($this->configuration, $config);
            }
        }

        public function render() {
            // Open link tag
            $builder = "<link ";

            // Add configured attributes
            foreach ($this->configuration as $key => $value) {
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
