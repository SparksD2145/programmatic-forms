<?php

namespace nobilis\marketing\forms\prebuilt\groups {
    require_once(dirname(__FILE__) . '/../forms.autoload.php');

    use nobilis\marketing\forms\base\ItemGroup;
    use nobilis\marketing\forms\prebuilt\fields\Hidden;

    class Attribution extends ItemGroup {
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