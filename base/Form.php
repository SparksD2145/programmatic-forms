<?php

namespace pgforms {
    class Form {
        public $configuration = [
            "items" => [],
            "autorender" => true,
            "newline" => true,
            "attributes" => [
                "name" => null,
                "id" => null,
                "class" => null,
                "accept" => null,
                "action" => null,
                "method" => null
            ]
        ];

        function __construct(array $items, array $config = null, array $attrs = null) {
            // Extend items
            $this->configuration['items'] = array_replace($this->configuration['items'], $items);

            // Extend configurations
            if (isset($config)) {
                $this->configuration = array_replace_recursive($this->configuration, $config);
            }

            // Extend attributes
            if (isset($attrs) && !empty($attrs)) {
                $this->configuration['attributes'] = array_replace($this->configuration['attributes'], $attrs);
            }

            // Add 'prog-form' class
            $this->configuration['attributes']['class'] .= " prog-form";

            // if autorender is configured, render the form automatically upon instantiation.
            if ($this->configuration['autorender']) {
                $this->render();
            }
        }

        public function render() {

            // Open form
            $builder = "<form ";

            // Clone attrs to remove items from the list.
            $attrs = array_merge([], $this->configuration['attributes']);

            // Take each value from the attrs and add it as an attribute.
            foreach ($attrs as $key => $value) {
                if (isset($value) && !empty($value)) {
                    $builder .= "$key='$value' ";
                }
            }

            // Close opening form tag.
            $builder .= ">";

            // Render items
            if (!empty($this->configuration['items'])) {

                // Add form items.
                foreach ($this->configuration['items'] as $item) {
                    $builder .= $item->render();

                    // If newline is set, all form items will be on a separate line.
                    if ($this->configuration['newline']) {
                        $builder .= "\n";
                    }
                }
            }

            // Close form tag.
            $builder .= '</form>';

            // Render
            echo $builder;
        }
    }
}
