<?php

namespace pgforms\prebuilt\groups {
    use pgforms\ItemGroup;
    use pgforms\prebuilt\fields\Hidden;

    class AttributionGroup extends ItemGroup {
        function __construct($config = null) {
            $items = [
                new Hidden([
                    "attributes" => [
                        "name" => "utm_campaign"
                    ]
                ]),
                new Hidden([
                    "attributes" => [
                        "name" => "roi_attribution"
                    ]
                ])
            ];

            parent::__construct($items, $config);
        }
    }
}
