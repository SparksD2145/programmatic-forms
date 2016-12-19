<?php

/**
 * Programmatic Forms global namespace.
 * @package pgform
 */
namespace pgform {

    /**
     * Base form object from which all forms are rendered.
     * @package pgform
     */
    class Form {

        /**
         * The default configuration of the form
         */
        protected $configuration = [
            /** An array of `FormItems` to pass to the form for rendering. */
            "items" => [],

            /** Specifies whether or not to automatically render the form. */
            "autoecho" => true,

            /** Should each FormItem be rendered onto a separate line? */
            "newline" => true,

            /** An optional unique identifier to append to the form's name */
            "unique-name" => null,

            /** HTML attributes */
            "attributes" => [
                "id" => null,
                "class" => null,
                "accept" => null,
                "action" => null,
                "method" => null,

                // For Nobilis Script to interpret form
                "data-async-submit" => true
            ]
        ];

        /**
         * Form constructor.
         * @param array $items FormItems, Containers and ItemGroups to attach to the form.
         * @param array|null $config Optional configuration for the form
         * @param array|null $attrs Optional attributes for the form (overrides configuration)
         */
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

            // Add 'pgform' class
            $this->configuration['attributes']['class'] .= " pgform";

            // Always add form name
            $this->configuration['attributes']['name'] = get_class($this);
            if (isset($this->configuration['unique-name'])) {
                $this->configuration['attributes']['name'] .= "|" . $this->configuration['unique-name'];
            }

            // Loop through items and apply additional logic
            foreach($this->configuration['items'] as $item) {

                // Add submit button logic
                if (isset($this->configuration['submit-text']) && $item instanceof \pgform\prebuilt\fields\Submit) {
                    $item->change_attribute([
                        "value" => $this->configuration['submit-text']
                    ]);
                }

                // Add reset button logic
                if (isset($this->configuration['reset-text']) && $item instanceof \pgform\prebuilt\fields\Reset) {
                    $item->change_attribute([
                        "value" => $this->configuration['reset-text']
                    ]);
                }

            }

            // if autoecho is configured, render the form automatically upon instantiation.
            if ($this->configuration['autoecho']) {
                $this->render();
            }
        }

        /**
         * Render the form in-place on the page.
         * @method string render()
         * @return string
         */
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

            return $builder;
        }
    }
}
