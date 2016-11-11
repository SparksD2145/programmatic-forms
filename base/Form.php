<?php

namespace nobilis\forms\base {
    class Form {
        private $configuration = [
            "items" => null,
            "name" => null,
            "class" => null,
            "accept" => null,
            "action" => null,
            "method" => null,
            "autorender" => true,
            "newline" => true
        ];

        // Generate a Globally Unique ID
        private static function GUID () {
            if (function_exists('com_create_guid')){
                return trim(com_create_guid(), '{}');
            }else{
                mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
                $charid = strtoupper(md5(uniqid(rand(), true)));
                $hyphen = chr(45);// "-"
                $uuid = chr(123)// "{"
                    .substr($charid, 0, 8).$hyphen
                    .substr($charid, 8, 4).$hyphen
                    .substr($charid,12, 4).$hyphen
                    .substr($charid,16, 4).$hyphen
                    .substr($charid,20,12)
                    .chr(125);// "}"
                return $uuid;
            }
        }

        // Config keys to ignore during a render
        private static $render_ignore_keys = ["items", "autorender", "newline"];

        function __construct($items, $config = null) {
            if (isset($items) && !empty($items)) {
                $this->configuration['items'] = $items;
            }

            if (isset($config) && !empty($config)) {
                $this->configuration = array_merge($this->configuration, $config);
            }

            // if autorender is configured, render the form automatically upon instantiation.
            if ($this->configuration['autorender']) {
                $this->render();
            }
        }

        public function render() {

            // Open form
            $builder = "<form ";

            // Assign ID
            $builder .= "id='". self::GUID() ."' ";

            // Clone config to remove items from the list.
            $config = array_merge([], $this->configuration);
            foreach (self::$render_ignore_keys as $key) {
                if (isset($config[$key])) unset($config[$key]);
            }

            // Take each value from the config and add it as an attribute.
            foreach ($config as $key => $value) {
                if (isset($value) && !empty($value)) {
                    $builder .= "$key='$value' ";
                }
            }

            // Close opening form tag.
            $builder .= ">";

            // Add form items.
            if (isset($this->configuration['items'])) {
                foreach ($this->configuration['items'] as $item) {
                    $builder .= $item->render();

                    // If newline is set, all form items will be on a separate line.
                    if ($this->configuration['newline']) {
                        $builder .= "\n";
                    }
                }
            }

            // Close form tag.
            $builder .= '</form>';

            // Render
            echo $builder;
        }
    }
}
