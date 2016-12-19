<?php

namespace pgform\prebuilt\groups {
    use pgform\ItemGroup;
    use pgform\prebuilt\fields\Reset;
    use pgform\prebuilt\fields\Submit;
    use pgform\types\Stylesheet;

    /**
     * Footer: contains a submit button and a reset button.
     * @package pgform\prebuilt\groups
     */
    class Footer extends ItemGroup {
        private $directory = 'prebuilt/groups/Footer/';

        /**
         * Footer constructor.
         * @param null $config
         */
        function __construct($config = null) {
            $items = [
                new Stylesheet([
                    "attributes" => [
                        "href" => $this->directory . 'footer-style.css'
                    ]
                ]),
                new Reset([
                    "attributes" => [
                        "class" => "half-width"
                    ]
                ]),
                new Submit([
                    "attributes" => [
                        "class" => "half-width"
                    ]
                ])
            ];

            parent::__construct($items, $config);
        }
    }
}
