<?php

namespace pgform\prebuilt\groups {
    require_once(dirname(__FILE__) . "/../../../types/Input.php");
    use pgform\Container;
    use pgform\ItemGroup;
    use pgform\types\Input;
    use pgform\types\Label;
    use pgform\types\Stylesheet;
    use pgform\types\Script;

    /**
     * Class MRIReport
     * @package pgform\prebuilt\groups
     */
    class MRIReport extends ItemGroup  {
        private $directory = 'prebuilt/groups/MRIReport/';

        /**
         * MRIReport constructor.
         */
        function __construct() {
            $items = [
                new Container([
                    new Container([
                        new Label([
                            "text" => 'May we request your MRI report?',
                            "attributes" => [
                                "class" => "maywerequest"
                            ]
                        ])
                    ]),
                    new Input([
                        "attributes" => [
                            "name" => "mRISendMethod",
                            "type" => "radio",
                            "value" => "true",
                            "required" => true
                        ]
                    ]),
                    new Label([
                        "text" => 'Yes, request MRI/CT from Imaging Center'
                    ]),
                    new Container([
                        new Input([
                            "attributes" => [
                                "name" => "imagingCenter",
                                "type" => "text",
                                "class" => "required",
                                "placeholder" => "Name of Imaging Center"
                            ]
                        ]),
                        new Input([
                            "attributes" => [
                                "name" => "DateofBirth",
                                "data-mask" => "00/00/0000",
                                "type" => "text",
                                "class" => "required",
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
                            "value" => "false",
                            "required" => true
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