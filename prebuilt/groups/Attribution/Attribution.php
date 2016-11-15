<?php

namespace pgforms\prebuilt\groups {
    use pgforms\ItemGroup;
    use pgforms\prebuilt\fields\Hidden;

    class AttributionGroup extends ItemGroup {
        function __construct($config = null) {
            $items = [
                new Hidden([
                    "name" => "utm_campaign"
                ]),
                new Hidden([
                    "name" => "roi_attribution"
                ])
            ];

            parent::__construct($items, $config);
        }
    }
}
