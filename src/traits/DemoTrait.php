<?php
namespace pgform\traits {

    use pgform\elements\Input;

    /**
     * Demo Trait
     * @package pgform\traits
     */
    trait DemoTrait {
        public function associate () {
            $this->amend_string_attribute("class", "demo-association");
            $this->insert(new Input());
        }
        abstract public function insert($item, $where = null);
        abstract public function amend_string_attribute($key, $value);
    }
}
