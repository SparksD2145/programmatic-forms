<?php

namespace pgform {
    require_once(dirname(__FILE__) . "/../base/Base.php");

    /**
     * A means to isolate a group of form items.
     */
    class Container extends _BASE {
        /**
         * Container constructor.
         * @param array $items FormItems to append to the container.
         * @param array|null $config Optional configuration array
         */
        function __construct(array $items, array $config = []) {
            $this->change_config(["items" => $items]);
            $this->change_attribute(["class" => "pgform-container"]);
            parent::__construct($config);
        }

        /**
         * Render a container
         * @method
         * @return string
         */
        public function render() {
            return $this->render_element_tag("div", false, true);
        }
    }
}
