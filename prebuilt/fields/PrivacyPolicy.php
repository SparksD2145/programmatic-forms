<?php

namespace pgforms\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Input.php");
    use pgforms\Container;
    use pgforms\types\Input;
    use pgforms\types\Label;

    class PrivacyPolicy extends Container  {

        function __construct() {
            $items = [
                new Input([
                    "name" => "acceptedPrivacyPolicy",
                    "type" => "checkbox"
                ]),
                new Label([
                    "text" => 'I accept the ' .
                        '<a href="/privacy-policy/" target="_blank" style="color: #e28a1e">Privacy Policy</a>' .
                        ' and <a href="/user-agreement/" target="_blank" style="color: #e28a1e">User Agreement</a>.' .
                        '<span class="required">*</span></label>'
                ])
            ];

            parent::__construct($items);
        }
    }
}