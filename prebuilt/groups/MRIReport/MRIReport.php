<?php

namespace pgforms\prebuilt\groups {
    require_once(dirname(__FILE__) . "/../../../types/Input.php");
    use pgforms\Container;
    use pgforms\ItemGroup;
    use pgforms\types\Input;
    use pgforms\types\Label;
    use pgforms\types\Stylesheet;
    use pgforms\types\Script;

    class MRIReport extends ItemGroup  {
        private $directory = 'prebuilt/groups/MRIReport/';

        function __construct() {
            $items = [
                new Container([
                    new Input([
                        "attributes" => [
                            "name" => "mRISendMethod",
                            "type" => "radio",
                            "value" => "true"
                        ]
                    ]),
                    new Label([
                        "text" => 'Yes, Request MRI/CT from Imaging Center'
                    ]),
                    new Container([
                        new Input([
                            "attributes" => [
                                "name" => "imagineCenter",
                                "type" => "text",
                                "class" => "required",
                                "required" => true,
                                "placeholder" => "Name of Imaging Center"
                            ]
                        ]),
                        new Input([
                            "attributes" => [
                                "name" => "DateofBirth",
                                "data-mask" => "00/00/0000",
                                "type" => "text",
                                "class" => "required",
                                "required" => true,
                                "placeholder" => "Date of Birth: mm/dd/yyyy",
                                "autocomplete" => "off"
                            ]
                        ])
                    ], [
                        "attributes" => [
                            "id" => "mri-center-info",
                            "class" => "pgform-container",
                            "style" => "display: none;"
                        ]
                    ])
                ]),
                new Container([
                    new Input([
                        "attributes" => [
                            "name" => "mRISendMethod",
                            "type" => "radio",
                            "value" => "false"
                        ]
                    ]),
                    new Label([
                        "text" => 'No'
                    ])
                ]),
                new Stylesheet([
                    "attributes" => [
                        "href" => $this->directory . 'mrireport.css'
                    ]
                ]),
                new Script([
                    "attributes" => [
                        "src" => $this->directory . 'mrireport.js'
                    ]
                ])
            ];

            parent::__construct($items);
        }
    }
}