<?php

namespace nobilis\forms\prebuilt\groups {
    require_once(dirname(__FILE__) . '/../forms.autoload.php');

    use nobilis\forms\base\ItemGroup;
    use nobilis\forms\prebuilt\fields\Hidden;

    class AttributionGroup extends ItemGroup {
        function __construct($config = null) {
            $items = [
                new Hidden([
                    "name" => "utm_campaign"
                ]),
                new Hidden([
                    "name" => "roi_attribution"
                ]),
            ];

            parent::__construct($items, $config);
        }
    }
}