<?php

/**
 * Programmatic Forms global namespace.
 * @package pgform
 */
namespace pgform {

    /**
     * Base object for all Programmatic Form entities.
     * @package pgform
     */
    class _BASE {

        /**
         * Base configuration object
         * @var array
         */
        public $configuration = [
            /** HTML attributes */
            "attributes" => [],

            /** Specifies whether or not to automatically render the entity. */
            "auto-echo" => false,

            /** Should each entity be rendered onto a separate line? */
            "each-item-on-new-line" => true,

            /** Child entities to render */
            "items" => []
        ];

        /**
         * _BASE constructor.
         * @param array $config Optional configuration
         */
        function __construct(array $config = []) {
            // Extend configuration
            $this->extend_config($config);
        }

        /**
         * Override/Extend the configuration object with a new configuration.
         * @method
         * @param array $new_config A configuration to override the previous with
         */
        public function extend_config(array $new_config) {
            $this->configuration = array_replace_recursive($this->configuration, $new_config);
        }

        /**
         * Change a configuration option externally.
         * @method
         * @param array $changes A mapping array indicating which keys and values to change
         */
        public function change_config(array $changes) {
            $this->configuration = array_replace_recursive($this->configuration, $changes);
        }

        /**
         * Change an attribute externally.
         * @method
         * @param array $changes A mapping array indicating which keys and values to change
         */
        public function change_attribute(array $changes) {
            $this->configuration['attributes'] = array_replace_recursive($this->configuration['attributes'], $changes);
        }

        /**
         * Abstracted Render method
         */
        public function render() {}

        /**
         * Renders the entity's tag.
         * @param string $tag The HTML tag of the entity
         * @param bool $is_self_closing Indicates if the entity tag is self closing.
         * @param bool $has_items Indicates if the entity has child entities.
         * @param null $text Plaintext content of a tag.
         * @return string
         */
        public function render_element_tag($tag, $is_self_closing = true, $has_items = false, $has_text = false) {
            $builder = "";

            // Perform pre-render rendering
            if (method_exists($this, "pre_render")) {
                $builder .= $this->pre_render();
            }

            // Start the tag
            $builder .= "<" . $tag  . " ";

            // Add attributes
            $builder .= $this->render_attributes();

            // Close a self closing tag
            if ($is_self_closing) {
                $builder .= "/>";
            } else {
                $builder .= ">";
            }

            // If there are child items, render them.
            if ($has_items) {
                $builder .= $this->render_items();
            }

            // If there is textual content, render it.
            if ($has_text && !empty($this->configuration["text"])) {
                $builder .= $this->configuration["text"];
            }

            // End the tag
            if (!$is_self_closing) {
                $builder .= "</" . $tag . ">";
            }

            // Perform post-render rendering
            if (method_exists($this, "post_render")) {
                $builder .= $this->post_render();
            }

            // If the item is instructed to echo, echo it.
            if (array_key_exists("auto-echo", $this->configuration) && $this->configuration["auto-echo"]) {
                echo $builder;
            }

            // Return built tag.
            return $builder;
        }

        /**
         * Render the tag's HTML Attributes
         * @return string
         */
        public function render_attributes() {
            $builder = "";

            // Take each value from the attrs and add it as an attribute.
            foreach ($this->configuration['attributes'] as $key => $value) {
                if (isset($value) && !empty($value)) {
                    $builder .= "$key='$value' ";
                }
            }

            return $builder;
        }

        /**
         * Render child entities
         * @return string
         */
        public function render_items() {
            $builder = "";

            if (isset($this->configuration['items'])) {
                foreach ($this->configuration['items'] as $item) {

                    if (method_exists($this, "pre_render_item")) {
                        $builder .= $this->post_render_item();
                    }

                    $builder .= $item->render();

                    // Add a new line if configured
                    if (array_key_exists("each-item-on-new-line", $this->configuration) &&
                        $this->configuration["each-item-on-new-line"]) {

                        $builder .= "\n";
                    }

                    // Perform post-item rendering
                    if (method_exists($this, "post_render_item")) {
                        $builder .= $this->post_render_item();
                    }
                }
            }

            return $builder;
        }

        /**
         * Return the relative url of a file from the plugin's directory.
         * @method
         * @param string $path A filename to check the relative url for.
         * @return string
         */
        public function relative_url ($path) {
            if (function_exists('plugins_url') && function_exists('plugin_dir_path')) {
                $plugin_dir = plugin_dir_path( dirname(__FILE__) );
                $path = str_replace($plugin_dir, "", $path);
                return plugins_url($path, $plugin_dir);
            } else {
                return $path;
            }
        }

        /**
         * Return the relative url of a file from the plugin's directory.
         * @method
         * @param string $path A filename to check the relative url for.
         * @return string
         */
        public function relative_dir_url ($path) {
            if (function_exists('plugins_url') && function_exists('plugin_dir_path')) {
                $path = dirname($path);
            }
            return $this->relative_url($path) . "/";
        }

        /**
         * Return the relative url of a file from the plugin's base directory.
         * @method
         * @param string $path A filename to check the relative url for.
         * @return string
         */
        public function relative_dir_url_from_base ($path) {
            if (function_exists('plugins_url') && function_exists('plugin_dir_path')) {
                $plugin_dir = plugin_dir_path( dirname(__FILE__) );
                $path = $plugin_dir . "/" . $path;
            }
            return $this->relative_url($path) . "/";
        }
    }
}
