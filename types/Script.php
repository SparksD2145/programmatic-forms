<?php

namespace nobilis\forms\types {

    require_once(dirname(__FILE__) . "/../base/FormItem.php");
    use \nobilis\forms\base\FormItem;

    class Script extends FormItem  {
        public $configuration = array(
            "async" => false,
            "defer" => false,
            "src" => null,
            "type" => 'text/javascript'
        );

        function __construct (array $config = null) {
            parent::__construct($config);

            if (isset($config) && !empty($config)) {
                $this->configuration = array_merge($this->configuration, $config);
            }
        }

        public function render() {
            // Open script tag
            $builder = "<script ";

            // Add configured attributes
            foreach ($this->configuration as $key => $value) {
                if (isset($value) && !empty($value)) {
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
