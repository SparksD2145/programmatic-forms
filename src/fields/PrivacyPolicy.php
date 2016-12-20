<?php

namespace pgform\fields {
    use pgform\Container;
    use pgform\elements\Input;
    use pgform\elements\Label;

    /**
     * Class PrivacyPolicy
     * @package pgform\fields
     */
    class PrivacyPolicy extends Container  {

        /**
         * PrivacyPolicy constructor.
         */
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
