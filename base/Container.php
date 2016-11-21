<?php

namespace pgforms {
    class Container {
        public $configuration = [
            "items" => [],
            "autorender" => true,
            "newline" => true,
            "attributes" => [
                "class" => "container"
            ]
        ];

        function __construct(array $items, array $config = null, array $attrs = null) {
            $this->configuration['items'] = array_replace($this->configuration['items'], $items);

            // Extend config
            if (isset($config) && !empty($config)) {
                $this->configuration = array_replace_recursive($this->configuration, $config);
            }

            // Extend attributes
            if (isset($attrs) && !empty($attrs)) {
                $this->configuration['attributes'] = array_replace($this->configuration['attributes'], $attrs);
            }

            // if autorender is configured, render the form automatically upon instantiation.
            if ($this->configuration['autorender']) {
                $this->render();
            }
        }

        public function render() {
            $builder = "<div ";

            $config = array_merge([], $this->configuration);

            // Add configured attributes
            foreach ($config['attributes'] as $key => $value) {
                if (isset($value) && !empty($value)) {
                    $builder .= "$key='$value' ";
                }
            }

            $builder .= ">";

            // Add container items.
            if (isset($this->configuration['items'])) {
                foreach ($this->configuration['items'] as $item) {
                    $builder .= $item->render();

                    // If newline is set, all form items will be on a separate line.
                    if ($this->configuration['newline']) {
                        $builder .= "\n";
                    }
                }
            }

            // Close container tag
            $builder .= "</div>";

            // Render
            return $builder;
        }
    }
}
