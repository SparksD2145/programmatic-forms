<?php
/**
 * Programmatic Forms Wordpress shortcode functions
 * @author Thomas Ibarra <tibarra@nobilishealth.com>
 * @since 1.1.0
 */

namespace pgform\shortcode {
    if (function_exists('add_shortcode') && function_exists('shortcode_atts')) {

        // Mappings for pgform shortcode attributes
        function shorthand_mappings() {
            return [
                // The name of the form
                "form" => "form",

                // An optional unique name for the form
                "unique-name" => null,

                // Attributes for the form
                "attributes" => "attributes",

                // Submit button text (if supported)
                "submit-text" => "submit-text",

                // Reset button text (if supported)
                "reset-text" => "reset-text"
            ];
        }

        // [pgform]
        function shorthand_call($attrs) {
            $possible_attrs = array_fill_keys(array_keys(shorthand_mappings()), null);
            $configuration = shortcode_atts($possible_attrs, $attrs);

            if (isset($configuration["form"])) {
                $form = "\\pgform\\prebuilt\\" . $configuration["form"];

                // Clean out unused config items
                $configuration = array_diff($configuration, [null]);

                // Prevent auto rendering, instead use shortcode rendering.
                $configuration['autorender'] = false;

                // Render form
                return (new $form($configuration))->render();
            }
        }
        add_shortcode('pgform', '\pgform\shortcode\shorthand_call');
    }
}