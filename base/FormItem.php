<?php

namespace pgform {

    /**
     * Individual form item base.
     * @package pgform
     */
    class FormItem {

        /**
         * @var array $configuration The default configuration of the form item.
         * @private
         */
        private $configuration = [
            "name" => null,
            "id" => null,
            "class" => null,
            "placeholder" => null
        ];

        /**
         * Return the relative url of a file from the plugin's directory.
         * @method
         * @param $path A filename to check the relative url for.
         * @return string
         */
        public function relative_url ($path) {
            if (function_exists('plugins_url') && function_exists('plugin_dir_path')) {
                return plugins_url($path, plugin_dir_path( __FILE__ ));
            } else {
                return $path;
            }
        }

        /**
         * FormItem constructor.
         * @param array|null $config Configuration object for the FormItem
         */
        function __construct (array $config = null) {
            if (isset($config) && !empty($config)) {
                $this->configuration = array_replace($this->configuration, $config);
            }
        }
    }
}
