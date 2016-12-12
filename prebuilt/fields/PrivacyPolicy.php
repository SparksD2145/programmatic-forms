<?php

namespace pgform\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Input.php");
    use pgform\Container;
    use pgform\types\Input;
    use pgform\types\Label;

    class PrivacyPolicy extends Container  {

        function __construct() {
            $items = [
                new Input([
                    "attributes" => [
                        "name" => "acceptedPrivacyPolicy",
                        "type" => "checkbox",
                        "required" => true,
                        "class" => "privacy-policy"
                    ]
                ]),
                new Label([
                    "text" => 'I accept the ' .
                        '<a href="/privacy-policy" target="_blank">Privacy Policy</a>' .
                        ' and <a href="/user-agreement" target="_blank">User Agreement</a>.' .
                        '<span class="required">*</span></label>'
                ])
            ];

            parent::__construct($items);
        }
    }
}