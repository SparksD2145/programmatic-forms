<?php

namespace pgforms\prebuilt\groups {
    use pgforms\ItemGroup;
    use pgforms\prebuilt\fields\InsuranceProvider;
    use pgforms\prebuilt\fields\InsuranceStateBCBS;
    use pgforms\types\Input;
    use pgforms\types\Script;
    use pgforms\types\Stylesheet;

    class InsuranceGroup extends ItemGroup {
        private $directory = 'prebuilt/groups/Insurance/';

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
                    'href' => $this->directory . 'insurance-style.css'
                ]),
                new Script([
                    'src' => $this->directory . 'insurance-script.js'
                ])
            ];

            parent::__construct($items, $config);
        }
    }
}
