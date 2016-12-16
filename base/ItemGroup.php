<?php

namespace pgform {

    /**
     * A means of grouping a number of FormItems together.
     * @package pgform
     */
    class ItemGroup {

        /**
         * @var array $configuration The default configuration of the form instance.
         * @private
         */
        private $configuration = [
            "items" => [],
            "autorender" => true,
            "newline" => true
        ];

        /**
         * ItemGroup constructor.
         * @param array $items FormItems for the ItemGroup.
         * @param null $config Configuration for the ItemGroup
         */
        function __construct(array $items, $config = null) {
            if (isset($items) && !empty($items)) {
                $this->configuration['items'] = array_replace($this->configuration['items'], $items);
            }

            if (isset($config) && !empty($config)) {
                $this->configuration = array_merge($this->configuration, $config);
            }

            // if autorender is configured, render the form automatically upon instantiation.
            if ($this->configuration['autorender']) {
                $this->render();
            }
        }

        /**
         * Render the ItemGroup to the Page
         * @method
         * @return string
         */
        public function render() {
            $builder = "";

            // Add group items.
            if (isset($this->configuration['items'])) {
                foreach ($this->configuration['items'] as $item) {
                    $builder .= $item->render();

                    // If newline is set, all form items will be on a separate line.
                    if ($this->configuration['newline']) {
                        $builder .= "\n";
                    }
                }
            }

            // Render
            return $builder;
        }
    }
}
