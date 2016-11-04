<?php

namespace nobilis\forms\prebuilt\groups {
    use nobilis\forms\base\ItemGroup;
    use nobilis\forms\prebuilt\fields\InsuranceProvider;
    use nobilis\forms\prebuilt\fields\InsuranceStateBCBS;
    use nobilis\forms\types\Input;
    use nobilis\forms\types\Script;
    use nobilis\forms\types\Stylesheet;

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
                ]),
                new Stylesheet([
                    'href' => 'prebuilt-groups/Insurance/insurance-style.css'
                ]),
                new Script([
                    'src' => 'prebuilt-groups/Insurance/insurance-script.js'
                ])
            ];

            parent::__construct($items, $config);
        }
    }
}
