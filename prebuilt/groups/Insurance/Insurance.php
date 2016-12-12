<?php

namespace pgform\prebuilt\groups {

    use pgform\Container;
    use pgform\ItemGroup;
    use pgform\prebuilt\fields\InsuranceProvider;
    use pgform\prebuilt\fields\InsuranceStateBCBS;
    use pgform\types\Input;
    use pgform\types\Label;
    use pgform\types\Script;
    use pgform\types\Stylesheet;

    class InsuranceGroup extends ItemGroup {
        private $directory = 'prebuilt/groups/Insurance/';

        function __construct($config = null) {
            $items = [
                new InsuranceProvider([
                    "attributes" => ["required" => true]
                ]),
                new Container([
                    new InsuranceStateBCBS()
                ], [
                    "attributes" => [
                        "class" => "bcbs-insurance-container"
                    ]
                ]),
                new Container([
                    new Input([
                        "attributes" => [
                            "type" => "text",
                            "name" => "other_insurance",
                            "placeholder" => "Please specify"
                        ]
                    ]),
                ], [
                    "attributes" => [
                        "class" => "other-insurance-container"
                    ]
                ]),
                new Label([
                    "attributes" => [
                        "class" => "disclaimer"
                    ],
                    "text" => "We are unable to accept Medicare or Medicaid."
                ]),
                new Stylesheet([
                    "attributes" => [
                        "href" => $this->directory . 'insurance.css'
                    ]
                ]),
                new Script([
                    "attributes" => [
                        "src" => $this->directory . 'insurance.js'
                    ]
                ])
            ];

            parent::__construct($items, $config);
        }
    }
}
