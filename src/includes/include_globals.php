<?php
namespace pgform\embedded {

    /**
     * Return the relative url of a file from the plugin's directory.
     * @method
     * @param string $path A filename to check the relative url for.
     * @return string
     */
    function relative_url ($path) {
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
    function relative_dir_url ($path) {
        if (function_exists('plugins_url') && function_exists('plugin_dir_path')) {
            $path = dirname($path);
        }
        return relative_url($path) . "/";
    }

    /**
     * Return the relative url of a file from the plugin's base directory.
     * @method
     * @param string $path A filename to check the relative url for.
     * @return string
     */
    function relative_file_url_from_base ($path) {
        if (function_exists('plugins_url') && function_exists('plugin_dir_path')) {
            $plugin_dir = plugin_dir_path( dirname(__FILE__) );
            $path = $plugin_dir . "/src/" . $path;
        }
        return relative_url($path);
    }

    /**
     * Return the relative url of a file from the plugin's base directory.
     * @method
     * @param string $path A filename to check the relative url for.
     * @return string
     */
    function relative_dir_url_from_base ($path) {
        if (function_exists('plugins_url') && function_exists('plugin_dir_path')) {
            $plugin_dir = plugin_dir_path( dirname(__FILE__) );
            $path = $plugin_dir . "/src/" . $path;
        }
        return relative_url($path) . "/";
    }

    if (function_exists("wp_enqueue_script") && function_exists("wp_enqueue_style")) {
        wp_enqueue_style("PGForm_globals", relative_file_url_from_base("includes/styles/global.css"));
        wp_enqueue_script("PGForm_globals", relative_file_url_from_base("includes/scripts/global.js"));
    }
}