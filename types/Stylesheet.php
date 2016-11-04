<?php

namespace nobilis\forms\types {

    require_once(dirname(__FILE__) . "/../base/FormItem.php");
    use \nobilis\forms\base\FormItem;

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
