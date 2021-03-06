<?php

namespace pgform {
    require_once(dirname(__FILE__) . "/../base/Base.php");

    /**
     * A means of grouping a number of FormItems together without isolating them in a containing element.
     * @package pgform
     */
    class ItemGroup extends Base {

        /**
         * ItemGroup constructor.
         * @param array $items FormItems for the ItemGroup.
         * @param array|null $config Configuration for the ItemGroup
         * @param array|null $default_config Default Configuration for the ItemGroup
         */
        function __construct(array $items, array $config = [], $default_config = []) {
            $this->change_config(["items" => $items]);
            parent::__construct($config, $default_config);
        }

        /**
         * Render the ItemGroup to the Page
         * @method
         * @return string
         */
        public function render() {
            return $this->render_items();
        }
    }
}
