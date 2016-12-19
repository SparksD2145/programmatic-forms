<?php

namespace pgform {

    /**
     * A means to isolate a group of form items.
     */
    class Container {

        /**
         * The default configuration of the container instance.
         */
        protected $configuration = [
            /** An array of `FormItems` to pass to the container for rendering. */
            "items" => [],

            /** Specifies whether or not to automatically render the container. */
            "autorender" => true,

            /** Should each FormItem be rendered onto a separate line? */
            "newline" => true,

            /** HTML attributes */
            "attributes" => [
                "class" => "pgform-container"
            ]
        ];

        /**
         * Container constructor.
         * @param array $items FormItems to append to the container.
         * @param array|null $config Optional configuration array
         * @param array|null $attrs Optional attributes array (overrides configuration)
         */
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

        /**
         * Render a container
         * @method
         * @return string
         */
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
