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
            "id" => null
        ], $attrs);

        if (isset($configuration["id"])) {
            $form = "\\pgform\\prebuilt\\" . $configuration["id"];
            return new $form();
        }
    }
    add_shortcode('pgform', 'pgform_shorthand_call');

}
