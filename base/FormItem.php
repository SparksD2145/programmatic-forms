<?php

namespace pgforms {
    class FormItem {
        public $configuration = [
            "name" => null,
            "id" => null,
            "class" => null,
            "placeholder" => null
        ];

        public function relative_url ($path) {
            if (function_exists('plugins_url') && function_exists('plugin_dir_path')) {
                return plugins_url($path, plugin_dir_path( __FILE__ ));
            } else {
                return $path;
            }
        }

        function __construct (array $config = null) {
            if (isset($config) && !empty($config)) {
                $this->configuration = array_replace($this->configuration, $config);
            }
        }
    }
}
