<?php

namespace pgforms {
    class ItemGroup {
        private $configuration = [
            "name" => 'insurance-group',
            "items" => null,
            "autorender" => true,
            "newline" => true
        ];

        // Config keys to ignore during a
        private static $render_ignore_keys = ["items", "autorender", "newline"];

        function __construct(array $items, $config = null) {
            if (isset($items) && !empty($items)) {
                $this->configuration['items'] = $items;
            }

            if (isset($config) && !empty($config)) {
                $this->configuration = array_merge($this->configuration, $config);
            }

            // if autorender is configured, render the form automatically upon instantiation.
            if ($this->configuration['autorender']) {
                $this->render();
            }
        }

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
