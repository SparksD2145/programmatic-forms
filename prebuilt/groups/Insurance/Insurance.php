<?php

namespace pgforms\prebuilt\groups {
    use pgforms\ItemGroup;
    use pgforms\prebuilt\fields\InsuranceProvider;
    use pgforms\prebuilt\fields\InsuranceStateBCBS;
    use pgforms\types\Input;
    use pgforms\types\Label;
    use pgforms\types\Script;
    use pgforms\types\Stylesheet;

    class InsuranceGroup extends ItemGroup {
        private $directory = 'prebuilt/groups/Insurance/';

        function __construct($config = null) {
            $items = [
                new InsuranceProvider([
                    "attributes" => ["required" => true]
                ]),
                new InsuranceStateBCBS([
                    "attributes" => ["required" => true]
                ]),
                new Input([
                    "attributes" => [
                        "type" => "text",
                        "name" => "other_insurance",
                        "required" => true,
                        "placeholder" => "Please specify"
                    ]
                ]),
                new Label([
                    "attributes" => [
                        "class" => "disclaimer"
                    ],
                    "text" => "We are unable to accept Medicare or Medicaid at this time."
                ]),
                new Stylesheet([
                    "attributes" => [
                        "href" => $this->directory . 'insurance-style.css'
                    ]
                ]),
                new Script([
                    "attributes" => [
                        "src" => $this->directory . 'insurance-script.js'
                    ]
                ])
            ];

            parent::__construct($items, $config);
        }
    }
}
