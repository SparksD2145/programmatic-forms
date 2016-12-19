<?php

namespace pgform {

    /**
     * Individual form item base.
     * @package pgform
     */
    class FormItem {

        /**
         * The default configuration of the form item.
         */
        protected $configuration = [];

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

        /**
         * Change a configuration option externally.
         * @param array $change
         */
        public function change_config(array $change) {
            $this->configuration = array_replace_recursive($this->configuration, $change);
        }

        /**
         * Change an attribute externally.
         * @param array $change
         */
        public function change_attribute(array $change) {
            $this->configuration['attributes'] = array_replace_recursive($this->configuration['attributes'], $change);
        }
    }
}
