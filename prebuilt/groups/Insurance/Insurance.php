<?php

namespace pgforms\prebuilt\groups {

    use pgforms\Container;
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
