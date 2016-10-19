<?php

namespace nobilis\forms\prebuilt\groups {
    require_once(dirname(__FILE__) . '/../forms.autoload.php');

    use nobilis\forms\base\ItemGroup;
    use nobilis\forms\prebuilt\fields\InsuranceProvider;
    use nobilis\forms\prebuilt\fields\InsuranceStateBCBS;
    use nobilis\forms\types\Input;

    class InsuranceGroup extends ItemGroup {
        function __construct($config = null) {
            $items = [
                new InsuranceProvider([
                    "required" => true
                ]),
                new InsuranceStateBCBS([
                    "required" => true
                ]),
                new Input([
                    "type" => "text",
                    "name" => "other_insurance",
                    "required" => true,
                    "placeholder" => "Please specify"
                ])
            ];

            parent::__construct($items, $config);
        }
    }
}