<?php
/**
 * Programmatic Forms Shortcode functions
 * @author Thomas Ibarra <tibarra@nobilishealth.com>
 * @since 1.1.0
 */

if (function_exists('add_shortcode')) {

    // [pgform]
    function pgform_shorthand_call($attrs) {
        $configuration = shortcode_atts([
            "id" => null,
            "submit-text" => null
        ], $attrs);

        if (isset($configuration["id"])) {
            $form = "\\pgform\\prebuilt\\" . $configuration["id"];
            new $form($configuration);
        }
    }
    add_shortcode('pgform', 'pgform_shorthand_call');

}
