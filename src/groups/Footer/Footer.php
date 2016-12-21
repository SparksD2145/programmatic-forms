<?php

namespace pgform\groups {
    use pgform\ItemGroup;
    use pgform\fields\Reset;
    use pgform\fields\Submit;
    use pgform\elements\Stylesheet;

    /**
     * Footer: contains a submit button and a reset button.
     * @package pgform\groups
     */
    class Footer extends ItemGroup {
        /**
         * Footer constructor.
         * @param array|null $config
         */
        function __construct(array $config = []) {
            $items = [
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
