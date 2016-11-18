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
                    'href' => $this->directory . 'footer-style.css'
                ]),
                new Reset(),
                new Submit()
            ];

            parent::__construct($items, $config);
        }
    }
}
