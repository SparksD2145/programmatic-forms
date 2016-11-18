<?php

namespace pgforms {
    class Container {
        private $configuration = [
            "class" => "container",
            "items" => [],
            "autorender" => true,
            "newline" => true
        ];

        // Config keys to ignore during a
        private static $render_ignore_keys = ["items", "autorender", "newline"];

        function __construct(array $items, $config = null) {
            if (isset($items) && !empty($items)) {
                $this->configuration['items'] = array_merge($this->configuration['items'], $items);
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
            $builder = "<div ";

            $config = array_merge([], $this->configuration);
            foreach (self::$render_ignore_keys as $key) {
                if (isset($config[$key])) unset($config[$key]);
            }

            // Add configured attributes
            foreach ($config as $key => $value) {
                if (isset($value) && !empty($value)) {
                    $builder .= "$key='$value' ";
                }
            }

            $builder .= ">";

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

            $builder .= "</div>";

            // Render
            return $builder;
        }
    }
}
