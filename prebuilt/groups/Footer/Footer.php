<?php

namespace pgforms\prebuilt\groups {
    use pgforms\ItemGroup;
    use pgforms\prebuilt\fields\Reset;
    use pgforms\prebuilt\fields\Submit;
    use pgforms\types\Stylesheet;

    class Footer extends ItemGroup {
        private $directory = 'prebuilt/groups/Footer/';

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
