<?php

namespace pgform {
    require_once(dirname(__FILE__) . "/../base/_BASE.php");

    /**
     * Individual form item base.
     * @package pgform
     */
    class FormItem extends _BASE {

        /**
         * FormItem constructor.
         * @param array|null $config Configuration object for the FormItem
         */
        function __construct (array $config = []) {
            parent::__construct($config);
        }
    }
}
