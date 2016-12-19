<?php
/**
 * Programmatic Forms Wordpress shortcode functions
 * @author Thomas Ibarra <tibarra@nobilishealth.com>
 * @since 1.1.0
 */

if (function_exists('add_shortcode')) {

    // Mappings for pgform shortcode attributes
    function pgform_shorthand_mappings() {
        return [
            // The name of the form
            "name" => "name",

            // Attributes for the form
            "attributes" => "attributes",

            // Submit button text (if supported)
            "submit-text" => "submit-text",

            // Reset button text (if supported)
            "reset-text" => "reset-text"
        ];
    }

    // [pgform]
    function pgform_shorthand_call($attrs) {
        $

        $configuration = shortcode_atts([
            "name" => null,
            "submit-text" => null
        ], $attrs);

        if (isset($configuration["name"])) {
            $form = "\\pgform\\prebuilt\\" . $configuration["name"];
            new $form($configuration);
        }
    }
    add_shortcode('pgform', 'pgform_shorthand_call');

}
