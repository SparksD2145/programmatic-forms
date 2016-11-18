<?php

namespace pgforms {
    class Form {
        private $configuration = [
            "items" => [],
            "name" => null,
            "id" => null,
            "class" => null,
            "accept" => null,
            "action" => null,
            "method" => null,
            "autorender" => true,
            "newline" => true
        ];

        // Config keys to ignore during a render
        private static $render_ignore_keys = ["items", "autorender", "newline"];

        function __construct($items, $config = null) {
            if (isset($items) && !empty($items)) {
                $this->configuration['items'] = array_merge($this->configuration['items'], $items);
            }

            if (isset($config) && !empty($config)) {
                $this->configuration = array_merge($this->configuration, $config);
            }

            // Add 'prog-form' id
            $this->configuration['class'] .= " prog-form";

            // if autorender is configured, render the form automatically upon instantiation.
            if ($this->configuration['autorender']) {
                $this->render();
            }
        }

        public function render() {

            // Open form
            $builder = "<form ";

            // Clone config to remove items from the list.
            $config = array_merge([], $this->configuration);
            foreach (self::$render_ignore_keys as $key) {
                if (isset($config[$key])) unset($config[$key]);
            }

            // Take each value from the config and add it as an attribute.
            foreach ($config as $key => $value) {
                if (isset($value) && !empty($value)) {
                    $builder .= "$key='$value' ";
                }
            }

            // Close opening form tag.
            $builder .= ">";


            if (isset($this->configuration['items'])) {


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
