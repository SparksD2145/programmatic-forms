<?php

namespace nobilis\marketing\forms\prebuilt {
    require_once(dirname(__FILE__) . "/../types/Select.php");
    require_once(dirname(__FILE__) . "/../types/Option.php");

    use nobilis\marketing\forms\types\Select;
    use nobilis\marketing\forms\types\Option;

    class InsuranceProvider extends Select {
        private $options = array(
            "Aetna" => 2,
            "BCBS" => 13,
            "CIGNA" => 17,
            "Humana" => 22,
            "Medicare" => 4,
            "Medicaid" => 11,
            "TriCare" => 5,
            "United Healthcare" => 6,
            "Workers Comp" => 18,
            "Other Insurance" => 7,
            "None" => 50
        );
        private $config = array(
            "name" => "insurance_provider",
            "placeholder" => "Insurance Provider",
            "options" => []
        );

        function __construct() {
            foreach ($this->options as $name => $value) {
                array_push($this->config['options'], new Option([
                    "name" => $name,
                    "value" => $value
                ]));
            }

            parent::__construct($this->config);
        }
    }
}