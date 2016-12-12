<?php

namespace pgform\prebuilt\groups {
    use pgform\ItemGroup;
    use pgform\prebuilt\fields\Reset;
    use pgform\prebuilt\fields\Submit;
    use pgform\types\Stylesheet;

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
